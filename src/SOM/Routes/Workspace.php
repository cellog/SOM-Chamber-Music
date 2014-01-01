<?php
namespace SOM\Routes;
use SOM, SOM\CM;
class Workspace extends SOM\Routes
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
            $date = date('Y') . ' Fall';
        }
        return str_replace('Chamber', $date . ' ' . $chamber, $workspace->name());
    }

    function activate(SOM $som)
    {
        $workspace = new CM(array('space_id' => $this->params['id']));
        echo '<h1>Archive and set up workspace</h1>';
        echo '<p>Clicking "Submit" will archive the existing workspace with the name <strong>',
             htmlspecialchars($this->getLastSemester()),
             '</strong> and Create a new workspace with the name of the existing workspace <strong>',
             htmlspecialchars($workspace->name()),
             '</strong>.  Choose a new name if you want to name it something else/<p>',
             '<form action="', $som->path(), '/workspace/clone/', $this->params['id'],
             '" method="post">',
             '<input type="text" name="archive" value="', htmlspecialchars($this->getLastSemester()), '">',
             '<input type="text" name="newworkspace" value="', htmlspecialchars($workspace->name()), '">',
             '<input type="submit" value="Clone"></form>';
    }
}?>
