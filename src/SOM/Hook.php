<?php
namespace SOM;
use SOM, Podio, PodioHook, PodioItem, PodioAppItemField;
class Hook extends SOM
{
    protected $primary = array();
    protected $secondary = array();
    protected $action = false;
    function __construct()
    {
        parent::__construct(true);
        if (isset($_SERVER['PATH_INFO'])) {
            $info = explode('/', $_SERVER['PATH_INFO']);
            $action = $info[1];
            $this->primary['id'] = $info[2];
            $this->primary['token'] = $info[3];
            if (isset($info[4])) {
                // secondary app
                $this->secondary['id'] = $info[4];
                $this->secondary['token'] = $info[5];
            }
            switch ($action) {
                case 'newgroup' :
                    $this->action = 'newgroup';
                    break;
                case 'deletegroup' :
                    $this->action = 'deletegroup';
                    break;
                case 'updategroup' :
                    $this->action = 'updategroup';
                    break;
                case 'newstudent' :
                    $this->action = 'newstudent';
                    break;
                case 'deletestudent' :
                    $this->action = 'deletestudent';
                    break;
                case 'updatestudent' :
                    $this->action = 'updatestudent';
                    break;
            }
        }
    }

    function preparePrimary()
    {
        Podio::authenticate('app', array('app_id' => $this->primary['id'],
                                         'app_token' => $this->primary['token']));
    }

    function prepareSecondary()
    {
        Podio::shutdown();
        Podio::authenticate('app', array('app_id' => $this->secondary['id'],
                                         'app_token' => $this->secondary['token']));
    }

    function newgroup($itemid)
    {
        // primary is Chamber Groups app
        // secondary is Students app
        $this->preparePrimary();
        $group = PodioItem::get($itemid);
        $members = $group->field('members');
        $groupid = $group->item_id;
        $ids = array();
        foreach ($members->values as $value) {
            $ids[] = $value['value']['item_id'];
        }
        $this->prepareSecondary();
        foreach ($ids as $id) {
            $member = PodioItem::get($id);
            $groups = $member->field('groups');
            if (!$groups) {
                $member->add_field(new PodioAppItemField(array('external_id' => 'groups',
                                                               'values' => array('value' => array('item_id' => $groupid)))));
                $groups = $member->field('groups');
                echo '<pre>', $groups; exit;
                echo "Creating";
            } else {
                foreach ($groups->values as $value) {
                    if ($value['value']['item_id'] == $groupid) {
                        // member already in the group
                        echo "Found";
                        continue 2;
                    }
                }
                echo "Adding";
                $newval = $groups->api_friendly_values();
                $newval[] = $groupid;
                $groups->set_value($newval);
            }
            $groups->save(array('hook' => false));
        }
    }

    function deletegroup($itemid)
    {
        
    }

    function updategroup($itemid)
    {
        
    }

    function act($itemid)
    {
        if ($this->action) {
            $action = $this->action;
            $this->$action($itemid);
        }
    }

    function perform($type, $params)
    {
        switch ($type) {
            case 'hook.verify':
            // Validate the webhook
            PodioHook::validate($params['hook_id'], array('code' => $params['code']));
            break;
            case 'item.create':
            case 'item.update':
            case 'item.delete':
                $this->act($params['item_id']);
        }
    }
}
