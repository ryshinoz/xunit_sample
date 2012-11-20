<?php
class ExampleTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testHello()
    {
        $example = new Example();
        $this->assertEquals('hello', $example->hello());
    }

    /**
     * @test
     */
    public function testAAA()
    {
        $example = new Example();
        $this->assertTrue($example->aaa(11));
        $this->assertFalse($example->aaa(10));
    }
}
