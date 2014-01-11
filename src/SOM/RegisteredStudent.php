<?php
namespace SOM;
use PodioItem;
class RegisteredStudent extends Podio
{
    protected $classname = false;
    protected $student = false;
    const APP_ID = 6484199;

    function getCurrentClass($noretrieve = false)
    {
        if ($this->classname) {
            return $this->classname;
        }
        $this->retrieve(null, true);
        $course = $this->getFieldValue('registered-for-course-2');
        $number = $this->getFieldValue('call-number-2');
        $this->classname = $course['value']['title'] . ' (' . ((int) $number['value']) . ')';
        return $this->classname;
    }

    function getStudent($noretrieve = false)
    {
        if ($this->student) {
            return $this->student;
        }
        $this->retrieve(null, true);
        $student = $this->getFieldValue('student');
        return $this->student = new StudentID($student['value']['item_id'], $noretrieve);
    }
}
