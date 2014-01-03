<?php
namespace SOM\Routes\Workspace;
use SOM, SOM\Workspace as CM, PodioSpace, SOM\Routes\Workspace, PodioApp, PodioAppMarketShare, PodioHook, Podio,
    SOM\Hook;
class Cloner extends Route
{
    protected $archivename;
    protected $newname;
    function __construct(Array $params = array())
    {
        $params = array('id' => $params[0]);
        parent::__construct($params);
        if (!isset($_POST) || !isset($_POST['newworkspace'])) {
            throw new \Exception('Cannot access this space except through form post');
        }
        $this->newname = $_POST['newworkspace'];
        $this->archivename = $_POST['archive'];
    }

    function activate(SOM $som)
    {
        $this->makeSpace($this->newname, $som);
    }

    protected function makeSpace($name, $som)
    {
        echo 'Renaming current space to <strong>', htmlspecialchars($this->archivename), '</strong><br>';
        PodioSpace::update($this->params['id'], array('name' => $this->archivename));
        $space = PodioSpace::create(array(
            'org_id' => $som->getOrg(),
            'name' => $name,
            'post_on_new_app' => true,
            'post_on_new_member' => true,
        ));
        echo "Created space <strong>", htmlspecialchars($name), "</strong><br>";
        // 66742 is the current chamber music pack.  This needs to be a constant in SOM class
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

        echo '<form name="hook" action="/SOM-Chamber-Music/index.php/makehook/',
             htmlspecialchars($spaceurl), '/', $this->params['id'], '" method="post">';
        echo '<a href="https://podio.com/unledu/' . $spaceurl . '/apps/' . $chambergroups->app_id . '/hooks" target="_blank">',
             'Click Here to copy the Chamber Groups token</a> and paste it here: <input type="text" ',
             'name="chamber" id="one" onchange="javascript:document.getElementById(\'chamber\').innerHTML=document.getElementById(\'one\').value"><br>';
        echo '<a href="https://podio.com/unledu/' . $spaceurl . '/apps/' . $students->app_id . '/hooks" target="_blank">',
             'Click Here to copy the Students token</a> and paste it here: <input type="text" ',
             'name="student" id="two" onchange="javascript:document.getElementById(\'student\').innerHTML=document.getElementById(\'two\').value"><br>';
        echo '<input type="submit" value="Click to Create Hooks">';
        echo '</form>';
    }
}
