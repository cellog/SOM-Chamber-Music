<?php
namespace SOM\Routes\Workspace;
use SOM, SOM\Workspace as CM, PodioSpace, SOM\Routes\Workspace, PodioApp, PodioAppMarketShare, PodioHook, Podio,
    SOM\Hook;
class Cloner extends Workspace
{
    protected $newname;
    function __construct(Array $params = array())
    {
        parent::__construct($params);
        if (!isset($_POST) || !isset($_POST['newworkspace'])) {
            throw new \Exception('Cannot access this space except through form post');
        }
        $this->newname = $_POST['newworkspace'];
    }

    function activate(SOM $som)
    {
        $this->makeSpace($this->newname, $som);
    }

    protected function makeSpace($name, $som)
    {
        $space = PodioSpace::create(array(
            'org_id' => $som->getOrg(),
            'name' => $name,
            'post_on_new_app' => true,
            'post_on_new_member' => true,
        ));
        echo "Created space <strong>", htmlspecialchars($name), "</strong><br>";
        $installed = PodioAppMarketShare::install(66742, array('space_id' => $space['space_id']));
        foreach ($installed['child_app_ids'] as $id) {
            PodioApp::get($id, array('type' => 'micro'));
        }
        echo "Installed <strong>Chamber Music</strong> app market pack<br>";
        // make hooks
        // find Chamber Groups app
        echo '<pre>';
        $spaceurl = explode('/', $space['url']);
        $spaceurl = array_pop($spaceurl);
        $chambergroups = PodioApp::member(Podio::get('/app/org/unledu/space/' . $spaceurl . '/chamber-groups', array()));
        // find Students app
        $students = PodioApp::member(Podio::get('/app/org/unledu/space/' . $spaceurl . '/students', array()));

        echo "<pre>";
        var_dump(Podio::get('/app/org/unledu/space/' . $spaceurl . '/chamber-groups', array()));return;
        $memberfield = $chambergroups->fields;
        foreach ($memberfield as $field) {
            if ($field->external_id == 'members') {
                $memberfield = $field->field_id;
                break;
            }
        }
        echo "Members field: " . $memberfield . "<br>";

        $newgroup = Hook::prepareUrl('newgroup', $chambergroups, $students);
        echo "Installing new group hook for chamber groups: <strong>", $newgroup,
             "</strong><br>";
        return;
        PodioHook::create('app_field', $memberfield, array('url' => $newgroup, 'type' => 'item.create'));
        echo "done<br>";

        $changegroup = Hook::prepareUrl('updategroup', $chambergroups, $students);
        echo "Installing update group hook for chamber groups: <strong>", $newgroup,
             "</strong><br>";

        PodioHook::create('app_field', $memberfield, array('url' => $newgroup, 'type' => 'item.update'));
        echo "done<br>";
    }
}
