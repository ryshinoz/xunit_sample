<?php
class Bowling2Test extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testRoll()
    {
        $bowling = new Bowling2();

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
    public function testHyperRollNonWednesdayWithMock()
    {
        $bowlingMock = $this->getMock('Bowling2', array('isWednesday'));
        $bowlingMock->expects($this->any())
            ->method('isWednesday')
            ->will($this->returnValue(false));

        for ($i = 0; $i < 100; $i++) {
            $this->assertThat($bowlingMock->hyperRoll(), $this->logicalAnd($this->greaterThanOrEqual(0), $this->lessThanOrEqual(BowlingDateTime::MAX_PINS_PER_ROLL)));
        }
    }

    /**
     * @test
     */
    public function testHyperRollWednesdayWithMock()
    {
        $bowlingMock = $this->getMock('Bowling2', array('isWednesday'));
        $bowlingMock->expects($this->any())
            ->method('isWednesday')
            ->will($this->returnValue(true));

        for ($i = 0; $i < 100; $i++) {
            $this->assertThat($bowlingMock->hyperRoll(), $this->logicalAnd($this->greaterThanOrEqual(10), $this->lessThanOrEqual(BowlingDateTime::MAX_PINS_PER_ROLL + 10)));
        }
    }
}
