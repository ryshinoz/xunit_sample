<?php
class Bowling
{
    const MAX_PINS_PER_ROLL = 10;
    const WEDNESDAY = 3;

    private $_dateTime;

    public function __construct(DateTime $dateTime)
    {
        $this->_dateTime = $dateTime;
    }

    public function roll()
    {
        return rand(0, self::MAX_PINS_PER_ROLL);
    }

    public function hyperRoll()
    {
        $score = $this->roll();

        if ($this->getDateTime()->format('w') == self::WEDNESDAY) {
            $score += 10;
        }

        return $score;
    }

    private function getDateTime()
    {
        return $this->_dateTime;
    }
}
