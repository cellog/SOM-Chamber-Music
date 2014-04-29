<?php
namespace SOM\Routes\Workspace;
use SOM, SOM\Workspace as CM, PodioSpace, SOM\Routes\Workspace, PodioApp, PodioAppMarketShare, PodioHook, Podio,
    SOM\Hook, SOM\Route, Chiara\PodioWorkspace as Space, Chiara\AuthManager as Auth;
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
        $spaceobj = new Space($space);
        echo "Created space <strong>", htmlspecialchars($name), "</strong><br>";
        // 66742 is the current chamber music pack.  This needs to be a constant in SOM class
        $installed = PodioAppMarketShare::install(66742, array('space_id' => $space['space_id']));
        echo "Installed <strong>Chamber Music</strong> app market pack<br>";
        // map tokens
        $tm = Auth::getTokenManager();
        foreach ($spaceobj->apps as $app) {
            $tm->saveToken($app->id, $app->token);
        }

        echo '<form name="hook" action="/SOM-Chamber-Music/index.php/makehook/',
             htmlspecialchars($spaceurl), '/', $this->params['id'], '" method="post">';
        echo '<input type="submit" value="Click to Create Hooks">';
        echo '</form>';
    }
}
