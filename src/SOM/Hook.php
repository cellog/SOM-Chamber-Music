<?php
namespace SOM;
use SOM, Podio, PodioHook, PodioItem, PodioAppItemField, PodioItemDiff, PodioApp,
    SOM\Student, SOM\Registration, SOM\Changes, SOM\Group;
class Hook extends SOM
{
    protected $primary = array();
    protected $secondary = array();
    protected $action = false;
    protected $tokens = array();
    function __construct()
    {
        $this->tokens = json_decode(file_get_contents('/home/chiaraqu/podiotokens.json'), 1);

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
            Podio::$logger->log("processing action " . $action);
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
                case 'newchange' :
                    $this->action = 'newchange';
                    break;
                case 'updatechange' :
                    $this->action = 'updatechange';
                    break;
                case 'newregistration' :
                    $this->action = 'newregistration';
                    break;
                case 'updateregistration' :
                    $this->action = 'updateregistration';
                    break;
                case 'registrategroup' :
                    $this->action = 'registrategroup';
                    break;
                case 'changes' :
                    $this->action = 'changes';
                    break;
            }
        }
    }

    function updateStudentAppInfo($appid, $token)
    {
        $this->tokens['students']['appid'] = (int) $appid;
        $this->tokens['students']['token'] = (string) $token;
        $this->saveTokens();
    }

    function updateChamberAppInfo($appid, $token)
    {
        $this->tokens['chamber']['appid'] = (int) $appid;
        $this->tokens['chamber']['token'] = (string) $token;
        $this->saveTokens();
    }

    protected function saveTokens()
    {
        file_put_contents('/home/chiaraqu/podiotoken.json', json_encode($this->tokens));
    }

    static function prepareUrl($action, PodioApp $primary, $primarytoken, PodioApp $secondary = null, $secondarytoken = null)
    {
        return 'http://chiaraquartet.net/SOM-Chamber-Music/hook.php/' . $action . '/' .
            $primary->app_id . '/' . $primarytoken . (
                null === $secondary ? '' :
                '/' . $secondary->app_id . '/' . $secondarytoken
            );
    }

    function prepareStudents()
    {
        Podio::authenticate('app', array('app_id' => $this->tokens['students']['appid'],
                                         'app_token' => $this->tokens['students']['token']));
    }

    function prepareChamber()
    {
        Podio::authenticate('app', array('app_id' => $this->tokens['chamber']['appid'],
                                         'app_token' => $this->tokens['chamber']['token']));
    }

    function prepareStudentIDs()
    {
        Podio::authenticate('app', array('app_id' => 6618817,
                                         'app_token' => $this->tokens['studentids']));
    }

    function prepareRegistration()
    {
        Podio::authenticate('app', array('app_id' => 6455277,
                                         'app_token' => $this->tokens['registration']));
    }

    function prepareNotRegistered()
    {
        Podio::authenticate('app', array('app_id' => 6484201,
                                         'app_token' => $this->tokens['notregistered']));
    }

    function prepareRegistered()
    {
        Podio::authenticate('app', array('app_id' => 6484199,
                                         'app_token' => $this->tokens['registered']));
    }

    function prepareChanges()
    {
        Podio::authenticate('app', array('app_id' => 6453745,
                                         'app_token' => $this->tokens['changes']));
    }

    function prepareNumbers()
    {
        Podio::authenticate('app', array('app_id' => 6454935,
                                         'app_token' => $this->tokens['numbers']));
    }

    function retrieveMembers($itemid)
    {
        $this->prepareChamber();
        $group = PodioItem::get($itemid);
        $members = $group->field('members');
        $groupid = $group->item_id;
        $ids = array();
        foreach ($members->values as $value) {
            $ids[] = $value['value']['item_id'];
        }
        $this->prepareStudents();
        return array($groupid, $ids);
    }

    function markStudentActive($member, $active = true)
    {
        $activefield = $member->field('active');
        $activefield->set_value($active ? 1 : 2);
        $activefield->save(array('hook' => false));
    }

    function testit($itemid)
    {
        $member = PodioItem::get($id);
        $this->markStudentActive($member, false);
    }

    function newstudent($itemid)
    {
        $this->prepareStudentIDs();
        $student = new StudentID();
        $student->saveNew($itemid);
    }

    function newgroup($itemid)
    {
        $ret = $this->retrieveMembers($itemid);
        $groupid = $ret[0];
        $ids = $ret[1];

        foreach ($ids as $id) {
            $member = PodioItem::get($id);
            $this->markStudentActive($member);
            //$groups = $member->field('groups');
            //if (!$groups) {
            //    $member->add_field(new PodioAppItemField(array('external_id' => 'groups')));
            //    $groups = $member->field('groups');
            //    $groups->set_value($groupid);
            //} else {
            //    foreach ($groups->values as $value) {
            //        if ($value['value']['item_id'] == $groupid) {
            //            // member already in the group
            //            continue 2;
            //        }
            //    }
            //    $newval = $groups->api_friendly_values();
            //    $newval[] = $groupid;
            //    $groups->set_value($newval);
            //}
            //$groups->save(array('hook' => false));
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
        $this->prepareChamber();
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
        $this->prepareStudents();

        foreach ($add as $id) {
            $member = PodioItem::get($id);
            $this->markStudentActive($member);
            //$groups = $member->field('groups');
            //if (!$groups) {
            //    $member->add_field(new PodioAppItemField(array('external_id' => 'groups')));
            //    $groups = $member->field('groups');
            //    $groups->set_value($itemid);
            //} else {
            //    foreach ($groups->values as $value) {
            //        if ($value['value']['item_id'] == $itemid) {
            //            // member already in the group
            //            continue 2;
            //        }
            //    }
            //    $newval = $groups->api_friendly_values();
            //    $newval[] = $itemid;
            //    $groups->set_value($newval);
            //}
            //$groups->save(array('hook' => false));
        }
        foreach ($remove as $id) {
            $member = PodioItem::get($id);
            $groups = $member->field('group-count');
            if ($groups > 1) {
                continue;
            } else {
                $this->markStudentActive($member, false);
            }
        }
    }

    function updatestudent($itemid)
    {
        $this->prepareStudentIDs();
        $student = new StudentID($itemid);
        $student->getReferences();
        $this->prepareRegistered();
        try {
            $inbetween = $student->getRegistrations(true);
        } catch (\Exception $e) {
            $this->prepareNotRegistered();
            $inbetween = $student->getRegistrations(true);
        }
        $inbetween->getReferences();
        $this->prepareRegistration();
        $registration = $inbetween->getRegistrations();
        foreach ($registration as $i => $reg) {
            $reg->getChanges(true);
        }
        $student->setRegistrations($registration);
        $this->prepareChanges();
        $student->update();
    }

    function newregistration($itemid)
    {
        $this->prepareChanges();
        $change = new Changes();
        $change->saveNew($itemid);
    }

    function updateregistration($itemid)
    {
        $this->prepareRegistration();
        $registration = new Registration($itemid);
        $registration->getChanges(true);
        if ($registration->isRegisteredStudent()) {
            $this->prepareRegistered();
        } else {
            $this->prepareNotRegistered();
        }
        $registration->getRegisteredStudent();
        $this->prepareChanges();
        $registration->update();
    }

    function registrategroup($itemid)
    {
        $this->prepareChamber();
        $group = new Group($itemid);
        $group->getReferences();
        $this->prepareRegistered();
        $registration = $group->getRegistrations();
        foreach ($registration as $i => $reg) {
            $reg->getChanges(true);
        }
        $group->setRegistrations($registration);
        $this->prepareChanges();
        $group->update();
    }

    function changes($itemid)
    {
        $this->prepareChanges();
        $change = new Changes($itemid);
        $this->prepareRegistration();
        $reg = $change->getRegistration();
        if ($reg->isRegisteredStudent()) {
            $this->prepareRegistered();
        } else {
            $this->prepareNotRegistered();
        }
        $reg->getRegisteredStudent();
        $this->prepareChanges();
        $change->update();
    }

    function act($itemid, $revision)
    {
        if ($this->action) {
            $action = $this->action;
            $this->$action($itemid, $revision);
        } else {
            Podio::$logger->log("no action");
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
