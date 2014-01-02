<?php
namespace SOM;
use SOM, Podio, PodioHook, PodioItem, PodioAppItemField, PodioItemDiff;
class Hook extends SOM
{
    protected $primary = array();
    protected $secondary = array();
    protected $action = false;
    function __construct()
    {
        parent::__construct(true);
        Podio::$logger->log("starting");
        if (isset($_SERVER['PATH_INFO'])) {
            Podio::$logger->log("processing");
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
                    Podio::$logger->log("updategroup");
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

    function retrieveMembers($itemid)
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
        return array($groupid, $ids);
    }

    function markStudentActive($member, $active = true)
    {
        $active = $member->field('active');
        $active->set_value($active ? 1 : 2);
        $active->save(array('hook' => false));
    }

    function newgroup($itemid)
    {
        // primary is Chamber Groups app
        // secondary is Students app
        $ret = $this->retrieveMembers($itemid);
        $groupid = $ret[0];
        $ids = $ret[1];

        foreach ($ids as $id) {
            $member = PodioItem::get($id);
            $this->markStudentActive($member);
            $groups = $member->field('groups');
            if (!$groups) {
                $member->add_field(new PodioAppItemField(array('external_id' => 'groups')));
                $groups = $member->field('groups');
                $groups->set_value($groupid);
            } else {
                foreach ($groups->values as $value) {
                    if ($value['value']['item_id'] == $groupid) {
                        // member already in the group
                        continue 2;
                    }
                }
                $newval = $groups->api_friendly_values();
                $newval[] = $groupid;
                $groups->set_value($newval);
            }
            $groups->save(array('hook' => false));
        }
    }

    function deletegroup($itemid)
    {
        // primary is Chamber Groups app
        // secondary is Students app
        $ret = $this->retrieveMembers($itemid);
        $groupid = $ret[0];
        $ids = $ret[1];
        foreach ($ids as $id) {
            $member = PodioItem::get($id);
            $groups = $member->field('groups');
            if (!$groups) {
                continue;
            } else {
                $newval = array_flip($groups->api_friendly_values());
                unset($newval[$groupid]);
                $groups->set_value(array_keys($newval));
            }
            $groups->save(array('hook' => false));
        }
    }

    function updategroup($itemid, $revisionid)
    {
        $this->preparePrimary();
        $diffs = PodioItemDiff::get_for($itemid, $revisionid - 1, $revisionid);
        foreach ($diffs as $diff) {
            if ($diff->label == 'Members') {
                // retrieve old members ids
                $ids = array();
                foreach ($diff->from as $member) {
                    $ids[$member['value']['item_id']] = 1;
                }
                $add = array();
                foreach ($diff->to as $member) {
                    if (isset($ids[$member['value']['item_id']])) {
                        // item exists
                        unset($ids[$member['value']['item_id']]);
                    } else {
                        $add[] = $member['value']['item_id'];
                    }
                }
                $remove = array_keys($ids);
            }
        }
        // primary is Chamber Groups app
        // secondary is Students app
        $this->prepareSecondary();

        foreach ($add as $id) {
            $member = PodioItem::get($id);
            $this->markStudentActive($member);
            $groups = $member->field('groups');
            if (!$groups) {
                $member->add_field(new PodioAppItemField(array('external_id' => 'groups')));
                $groups = $member->field('groups');
                $groups->set_value($itemid);
            } else {
                foreach ($groups->values as $value) {
                    if ($value['value']['item_id'] == $itemid) {
                        // member already in the group
                        continue 2;
                    }
                }
                $newval = $groups->api_friendly_values();
                $newval[] = $itemid;
                $groups->set_value($newval);
            }
            $groups->save(array('hook' => false));
        }
        foreach ($remove as $id) {
            $member = PodioItem::get($id);
            $groups = $member->field('groups');
            if (!$groups) {
                continue;
            } else {
                $newval = array_flip($groups->api_friendly_values());
                unset($newval[$itemid]);
                $this->markStudentActive($member, count($newval));
                $groups->set_value(array_keys($newval));
            }
            $groups->save(array('hook' => false));
        }
    }

    function act($itemid, $revision)
    {
        if ($this->action) {
            $action = $this->action;
            $this->$action($itemid, $revision);
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
                $this->act($params['item_id'], $params['item_revision_id']);
        }
    }
}
