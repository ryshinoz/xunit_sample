<?php
class StringUtilTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testReverse_TextIsEmpty()
    {
        $text = '';

        try {
            StringUtil::reverse($text);
        } catch (Exception $ex) {
            return;
        }
        $this->fail('例外がthrowされない');
    }

    /**
     * @test
     */
    public function testReverse()
    {
        $text = 'Hello World!';
        $this->assertThat(StringUtil::reverse($text), $this->equalTo('!dlroW olleH'));
    }
}
