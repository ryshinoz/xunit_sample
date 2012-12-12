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

    /**
     * @test
     */
    public function testReverse_Multibyte()
    {
        // 現在の実装のままだとテストが通らない
        $text = 'テスト';
        $this->assertThat(StringUtil::reverse($text), $this->equalTo('トステ'));
    }

    /*
     * @test
     */
    public function testUpperWithText() {
        $text = 'Hello World!';
        $this->assertThat(StringUtil::toUpper($text), $this->equalTo('HELLO WORLD!'));
    }
    
    /**
     * @test
     */
    public function testReverse_TextIsEmptyWithTryCatch()
    {
        $text = '';
    
        try {
            StringUtil::toUpper($text);
        } catch (Exception $ex) {
            return;
        }
        $this->fail('ぶー');
    }
    
    /**
     * @expectedException Exception
     */
    public function testToUpper_TextIsEmpty() {
        StringUtil::toUpper('');
    }
    
    /**
     * @test
     */
    public function testAddSpace_EmptyReturnsEmpty() {
        $input = '';
        $this->assertThat(StringUtil::addSpace($input), $this->equalTo($input));
    }

    /**
     * @test
     */
    public function testAddSpace_oneCharReturnsSelf() {
        $input = 'a';
        $this->assertThat(StringUtil::addSpace($input), $this->equalTo($input));
    }
    
    /**
     * @test
     */
    public function testAddSpace_twoCharReturnsOneSpaced() {
        $input = 'ab';
        $this->assertThat(StringUtil::addSpace($input), $this->equalTo('a b'));
    }
}
