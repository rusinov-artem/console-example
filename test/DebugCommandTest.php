<?php

namespace RusinovArtem\ConsoleAppExample\Test;

use PHPUnit\Framework\TestCase;
use RusinovArtem\Console\BuildInput;

use RusinovArtem\ConsoleAppExample\Command\Debug;

class DebugCommandTest extends TestCase
{
    public function test_CanShowEmptyLists()
    {
        $inp = BuildInput::from("debug", "");
        $out = new OutSpy();
        $command = new Debug();
        $command->run($inp, $out);
        $expected = <<<TEXT
        Called command: debug
        Entry point: ./run
        Arguments:
          No arguments passed
        
        Options:
          No options passed
        
        
        TEXT;

        self::assertEquals($expected, $out->stdout);
    }

    public function test_CanShowSingleArg()
    {
        $inp = BuildInput::from("debug", "{arg1}");
        $out = new OutSpy();
        $command = new Debug();
        $command->run($inp, $out);
        $expected = <<<TEXT
        Called command: debug
        Entry point: ./run
        Arguments:
          -  arg1
        Options:
          No options passed
        
        
        TEXT;

        self::assertEquals($expected, $out->stdout);
    }

    public function test_CanShowMultipleArgs()
    {
        $inp = BuildInput::from("debug", "{arg1,arg2}");
        $out = new OutSpy();
        $command = new Debug();
        $command->run($inp, $out);
        $expected = <<<TEXT
        Called command: debug
        Entry point: ./run
        Arguments:
          -  arg1
          -  arg2
        Options:
          No options passed
        
        
        TEXT;

        self::assertEquals($expected, $out->stdout);
    }

    public function test_CanShowParameter()
    {
        $inp = BuildInput::from("debug", "[name=Artem]");
        $out = new OutSpy();
        $command = new Debug();
        $command->run($inp, $out);
        $expected = <<<TEXT
        Called command: debug
        Entry point: ./run
        Arguments:
          No arguments passed
        
        Options:
          -  name:
            -  Artem

        TEXT;

        self::assertEquals($expected, $out->stdout);
    }
}