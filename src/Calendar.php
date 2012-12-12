<?php
class Calendar
{
    const WEDNESDAY = 'Wed';

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
        if ($this->_dateTime->format('D') == self::WEDNESDAY) {
            return true; 
        }
        return false; 
    }
    /**
     * @test
     */
}
