<?php
class CalendarTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testIsWednesday()
    {
        $dateTime = new DateTime('2012-12-12 00:00:00');
        $calendar = new Calendar($dateTime);
        $this->assertThat($calendar->isWednesday(), $this->isTrue(), '水曜日');

        $dateTime = new DateTime('2012-12-11 00:00:00');
        $calendar = new Calendar($dateTime);
        $this->assertThat($calendar->isWednesday(), $this->isFalse(), '火曜日');
    }
}
