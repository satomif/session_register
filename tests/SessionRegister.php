<?php
namespace Satomif\SessionRegister\Tests;

class SessionRegisterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testSessionRegister()
    {
        global $hello;
        $hello = 'world';
        if (! empty($_SESSION)) {
            $this->assertTrue(false);
        }

        $return = \session_register('hello');

        $this->assertSame('world', $_SESSION['hello']);
        $this->assertTrue($return);
    }

    /**
     * @runInSeparateProcess
     */
    public function testSessionRegisterFail()
    {
        $hello = 'world2';
        if (! empty($_SESSION)) {
            $this->assertTrue(false);
        }

        $return = \session_register('hello');
        if (! empty($_SESSION)) {
            $this->assertTrue(false);
        }
        $this->assertFalse($return);
    }
}