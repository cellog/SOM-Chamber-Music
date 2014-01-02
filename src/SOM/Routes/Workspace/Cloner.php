<?php
namespace SOM\Routes\Workspace;
use SOM, SOM\Workspace as CM, PodioSpace, SOM\Routes\Workspace, PodioApp, PodioAppMarketShare;
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
        
    }
}
