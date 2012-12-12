<?php
class BowlingDateTimeDateTimeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testRoll()
    {
        $dateTime = new DateTime();
        $bowling = new BowlingDateTime($dateTime);

        for ($i = 0; $i < 50; $i++) {
            $score = $bowling->roll();
            $this->assertThat($score, $this->greaterThanOrEqual(0), 'スコアは0以上');
            $this->assertThat($score, $this->lessThanOrEqual(BowlingDateTime::MAX_PINS_PER_ROLL), 'スコアは10以内');
            $this->assertThat($score, $this->logicalAnd($this->greaterThanOrEqual(0), $this->lessThanOrEqual(BowlingDateTime::MAX_PINS_PER_ROLL)), 'スコアは0以上10以内');
        }
    }

    /**
     * @test
     */
    public function testHyperRollNonWednesdayWithInjection()
    {
        // 火曜日
        $dateTime = new DateTime('2012-12-11');
        $bowling = new BowlingDateTime($dateTime);

        for ($i = 0; $i < 100; $i++) {
            $this->assertThat($bowling->hyperRoll(), $this->logicalAnd($this->greaterThanOrEqual(0), $this->lessThanOrEqual(BowlingDateTime::MAX_PINS_PER_ROLL)));
        }
    }

    /**
     * @test
     */
    public function testHyperRollWednesdayWithInjection()
    {
        // 水曜日
        $dateTime = new DateTime('2012-12-12');
        $bowling = new BowlingDateTime($dateTime);

        for ($i = 0; $i < 100; $i++) {
            $this->assertThat($bowling->hyperRoll(), $this->logicalAnd($this->greaterThanOrEqual(0), $this->lessThanOrEqual(BowlingDateTime::MAX_PINS_PER_ROLL + 10)));
        }
    }

    /**
     * @test
     */
    public function testHyperRollNonWednesdayWithMock()
    {
        $bowlingMock = $this->getMock('BowlingDateTime', array('getDateTime'), array(new DateTime('2012-12-11')));

        for ($i = 0; $i < 100; $i++) {
            $this->assertThat($bowlingMock->hyperRoll(), $this->logicalAnd($this->greaterThanOrEqual(0), $this->lessThanOrEqual(BowlingDateTime::MAX_PINS_PER_ROLL)));
        }
    }

    /**
     * @test
     */
    public function testHyperRollWednesdayWithMock()
    {
        $bowlingMock = $this->getMock('BowlingDateTime', array('getDateTime'), array(new DateTime('2012-12-11')));

        for ($i = 0; $i < 100; $i++) {
            $this->assertThat($bowlingMock->hyperRoll(), $this->logicalAnd($this->greaterThanOrEqual(0), $this->lessThanOrEqual(BowlingDateTime::MAX_PINS_PER_ROLL + 10)));
        }
    }
}
