<?php
namespace SOM\Routes;
use SOM, SOM\Workspace as CM, PodioSpace;
class Workspace extends SOM\Route
{
    function __construct(Array $params = array()) {
        if (!isset($params[0])) {
            throw new \Exception('Fail: need id');
        }
        $params = array('id' => $params[0]);
        parent::__construct($params);
    }

    function getLastSemester($workspace)
    {
        $month = date('m');
        if ($month >= 5) {
            $date = date('Y') . ' Spring';
        } else {
            $date = (date('Y') - 1) . ' Fall';
        }
        return str_replace('Chamber', $date . ' Chamber', $workspace->name()) . ' Archive';
    }

    function activate(SOM $som)
    {
        $workspace = new CM($this->params['id']);
        echo '<h1>Archive and set up workspace</h1>';
        echo '<p>Clicking "Submit" will archive the existing workspace with the name <strong>',
             htmlspecialchars($this->getLastSemester($workspace)),
             '</strong> and<br>Create a new workspace with the name of the existing workspace <strong>',
             htmlspecialchars($workspace->name()),
             '</strong>.  Choose a new name if you want to name it something else/<p>',
             '<form action="', $som->path(), '/clone/', $this->params['id'],
             '" method="post">',
             'Archive name: <input type="text" name="archive" size="40" value="', htmlspecialchars($this->getLastSemester($workspace)), '">',
             '<br>New Name<input type="text" name="newworkspace" size="30" value="', htmlspecialchars($workspace->name()), '">',
             '<br><input type="submit" value="Clone"></form>';
    }
}?>
