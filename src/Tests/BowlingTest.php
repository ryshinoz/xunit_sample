<?php
class BowlingTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testRoll()
    {
        $calendar = new Calendar();
        $bowling = new Bowling($calendar);

        for ($i = 0; $i < 50; $i++) {
            $score = $bowling->roll();
            $this->assertThat($score, $this->greaterThanOrEqual(0), 'スコアは0以上');
            $this->assertThat($score, $this->lessThanOrEqual(Bowling::MAX_PINS_PER_ROLL), 'スコアは10以内');
            $this->assertThat($score, $this->logicalAnd($this->greaterThanOrEqual(0), $this->lessThanOrEqual(Bowling::MAX_PINS_PER_ROLL)), 'スコアは0以上10以内');
        }
    }

    /**
     * @test
     */
    public function testHyperRollNonWednesdayWithInjection()
    {
        // 火曜日
        $dateTime = new DateTime('2012-12-11');
        $calendar = new Calendar($dateTime);
        $bowling = new Bowling($calendar);

        for ($i = 0; $i < 100; $i++) {
            $this->assertThat($bowling->hyperRoll(), $this->logicalAnd($this->greaterThanOrEqual(0), $this->lessThanOrEqual(Bowling::MAX_PINS_PER_ROLL)));
        }
    }

    /**
     * @test
     */
    public function testHyperRollWednesdayWithInjection()
    {
        // 水曜日
        $dateTime = new DateTime('2012-12-12');
        $calendar = new Calendar($dateTime);
        $bowling = new Bowling($calendar);

        for ($i = 0; $i < 100; $i++) {
            $this->assertThat($bowling->hyperRoll(), $this->logicalAnd($this->greaterThanOrEqual(0), $this->lessThanOrEqual(Bowling::MAX_PINS_PER_ROLL + 10)));
        }
    }

    /**
     * @test
     */
    public function testHyperRollNonWednesdayWithMock()
    {
        $calendar = $this->getMock('Calendar');
        $calendar->expects($this->any())
            ->method('isWednesday')
            ->will($this->returnValue(false));

        $bowling = new Bowling($calendar);

        for ($i = 0; $i < 100; $i++) {
            $this->assertThat($bowling->hyperRoll(), $this->logicalAnd($this->greaterThanOrEqual(0), $this->lessThanOrEqual(Bowling::MAX_PINS_PER_ROLL)));
        }
    }

    /**
     * @test
     */
    public function testHyperRollWednesdayWithMock()
    {
        $calendar = $this->getMock('Calendar');
        $calendar->expects($this->any())
            ->method('isWednesday')
            ->will($this->returnValue(true));

        $bowling = new Bowling($calendar);

        for ($i = 0; $i < 100; $i++) {
            $this->assertThat($bowling->hyperRoll(), $this->logicalAnd($this->greaterThanOrEqual(0), $this->lessThanOrEqual(Bowling::MAX_PINS_PER_ROLL + 10)));
        }
    }
}
