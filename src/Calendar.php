<?php
class Calendar
{
    const WEDNESDAY = 3;

    private $_dateTime;

    public function __construct($dateTime = null)
    {

        if (is_null($dateTime))
        {
            $dateTime = new DateTime();
        }
        $this->_dateTime = $dateTime;
    }

    public function isWednesday()
    {
        return $this->_dateTime->format('w') == self::WEDNESDAY;
    }
}
