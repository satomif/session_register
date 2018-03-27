<?php
namespace Satomif\SessionRegister\Tests;

class SessionRegisterTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        session_destroy();
    }

    /**
     * @runInSeparateProcess
     */
    public function testSessionRegister()
    {
        global $hello;
        $hello = 'world';
        $return = \session_register('hello');

        $this->assertSame('world', $_SESSION['hello']);
        $this->assertTrue($return);
    }

    /**
     * @runInSeparateProcess
     */
    public function testSessionRegisterFail()
    {
        $_SESSION = [];
        $hello = 'world2';
        $return = \session_register('hello');

        $this->assertEmpty($_SESSION);
        $this->assertFalse($return);
    }
}