<?php
namespace SOM\Model;
class ChamberGroups extends \Chiara\PodioItem
{
    protected $MYAPPID=7907978;
    function __construct($info = null, $retrieve = true)
    {
        parent::__construct($info, new \SOM\Model\Structure\ChamberGroups, $retrieve);
    }

    /**
     * handle an item.create hook in here
     * @param array $params any url-specific parameters passed in to
     *                       differentiate between hooks.  The item is already set up
     *                       and can be used immediately.
     */
    /*
    function onItemCreate($params)
    function onItemUpdate($params)
    function onItemDelete($params)
    function onCommentCreate($params)
    function onCommentDelete($params)
    function onFileChange($params)
    {
    }
    */

    function onItemCreate($params)
    {
        $this->updateMemberActive();
        $this->updateMemberGroups();
        foreach ($this->fields['members'] as $member) {
            $member->save();
        }
    }

    function onItemUpdate($params)
    {
        $diff = $this->diff($params['revision_id'] - 1);
        if (!isset($diff['members'])) return;
        foreach ($diff['members']->added as $member) {
            $member->fields['active'] = 'Yes';
            if (!$member->inGroup($this)) {
                $members->fields['groups']->value[] = $this;
            }
            $member->save();
        }
        foreach ($diff['members']->deleted as $member) {
            unset($members->fields['groups']->value[$this->id]);
            if (!count($member->fields['groups'])) {
                $member->fields['active'] = 'No';
            }
            $member->save();
        }
    }

    function updateMemberActive()
    {
        foreach ($this->fields['members'] as $member) {
            $member->fields['active'] = 'Yes';
        }
    }

    function updateMemberGroups()
    {
        foreach ($this->fields['members'] as $member) {
            if (!$member->inGroup($this)) {
                $member->fields['groups']->value[] = $this;
            }
        }
    }
}
