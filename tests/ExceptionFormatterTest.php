<?php

use MistyUtils\ExceptionFormatter;
use MistyUtils\StringUtil;

class ExceptionFormatterTest extends \MistyTesting\UnitTest
{
    public function testGetCallStack()
    {
        try {
            $this->instanceFunction();
            $this->fail();
        } catch(Exception $e) {
            $formatter = new ExceptionFormatter($e);
        }

        $calls = $formatter->getCallStack();

        $this->assertTrue(StringUtil::startsWith($calls[0], 'function genericFuncion()'));
        $this->assertTrue(StringUtil::startsWith($calls[1], 'ExceptionFormatterTest::{closure}()'));
        $this->assertTrue(StringUtil::startsWith($calls[2], 'ExceptionFormatterTest::staticFunction()'));
        $this->assertTrue(StringUtil::startsWith($calls[3], 'ExceptionFormatterTest->instanceFunction()'));
    }

    private function instanceFunction()
    {
        self::staticFunction();
    }

    private static function staticFunction()
    {
        $closure = function(){
            genericFuncion();
        };
        $closure();
    }
}

function genericFuncion(){
    throw new \Exception();
}
