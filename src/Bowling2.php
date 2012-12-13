
<?php
class Bowling2
{
    const MAX_PINS_PER_ROLL = 10;
    const WEDNESDAY = 3;

    private $_dateTime;

    public function __construct()
    {
    }

    public function roll()
    {
        return rand(0, self::MAX_PINS_PER_ROLL);
    }

    public function hyperRoll()
    {
        $score = $this->roll();

        if ($this->isWednesday()) {
            $score += 10;
        }
        return $score;
    }

    protected function isWednesday()
    {
        $dateTime = new DateTime();
        return $dateTime->format('w') == self::WEDNESDAY;
    }
}
