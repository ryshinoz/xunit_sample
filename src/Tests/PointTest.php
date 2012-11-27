<?php
class PointTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testAdd()
    {
        $addPoint = 15;

        $point = new Point(10);
        $point->add($addPoint);

        $this->assertThat($point->getPoint(), $this->equalTo(25), '0ポイント以上で足す');
    }

    /**
     * @test
     */
    public function testAdd_AddPointIsMinus()
    {
        $addPoint = -15;

        $point = new Point(10);
        $point->add($addPoint);

        $this->assertThat($point->getPoint(), $this->equalTo(10), '0ポイント未満を足す');
    }

    /**
     * @test
     */
    public function testSubstract()
    {
        $substractPoint = 5;

        $point = new Point(10);
        $point->substract($substractPoint);

        $this->assertThat($point->getPoint(), $this->equalTo(5), 'ポイントを0以上で引く');
    }

    /**
     * @test
     */
    public function testSubstract_SubstractPointIsMinus()
    {
        $substractPoint = -15;

        $point = new Point(10);
        $point->substract($substractPoint);

        $this->assertThat($point->getPoint(), $this->equalTo(10), 'ポイントを0未満で引く');
    }

    /**
     * @test
     */
    public function testSubstract_SubstractPointIsGreaterThanMyPoint()
    {
        $substractPoint = 11;

        try {
            $point = new Point(10);
            $point->substract($substractPoint);
        } catch (Exception $ex) {
            return;
        }
        $this->fail('例外が発生しなかったよー');
    }
}
