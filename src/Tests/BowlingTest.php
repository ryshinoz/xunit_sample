<?php
class BowlingTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testRoll()
    {
        $bowling = new Bowling();

        for ($i = 0; $i < 50; $i++) {
            $score = $bowling->roll();
            $this->assertThat($score, $this->greaterThanOrEqual(0), 'スコアは0以上');
            $this->assertThat($score, $this->lessThanOrEqual(Bowling::MAX_PINS_PER_ROLL), 'スコアは10以内');
            $this->assertThat($score, $this->logicalAnd($this->greaterThanOrEqual(0), $this->lessThanOrEqual(Bowling::MAX_PINS_PER_ROLL)), 'スコアは0以上10以内');
        }
    }
}
