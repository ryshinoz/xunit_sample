<?php
class Bowling2
{
    const MAX_PINS_PER_ROLL = 10;

    private $_calendar;

    public function __construct(Calendar $calendar)
    {
        $this->_calendar = $calendar;
    }

    public function roll()
    {
        return rand(0, self::MAX_PINS_PER_ROLL);
    }

    public function hyperRoll()
    {
        $score = $this->roll();

        if ($this->_calendar->isWednesday()) {
            $score += 10;
        }

        return $score;
    }
}
