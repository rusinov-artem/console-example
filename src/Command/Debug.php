<?php

namespace RusinovArtem\ConsoleAppExample\Command;

use RusinovArtem\Console\Command\Command;
use RusinovArtem\Console\Input;
use RusinovArtem\Console\Output;

class Debug extends Command
{
    public static function getDescription(): string
    {
        return "Describe passed options";
    }

    public static function getHelp(string $entryPoint, string $command): string
    {
        return <<<TEXT
        This command describes all input parameters
        usage:
          php $entryPoint $command {arg1,arg2,arg3} [p1={Val1,Val2}]
        TEXT;
    }

    public function run(Input $inp, Output $out): int
    {
        $out->out("Called command: $inp->commandName\n");
        $out->out("Entry point: $inp->entryPoint\n");
        $this->showArguments($inp, $out);
        $this->showParameters($inp, $out);
        return 0;
    }

    protected function showArguments(Input $inp, Output $out)
    {
        $out->out("Arguments:\n");
        $list = $inp->arguments->getList();
        if (empty($list)) {
            $out->out("  No arguments passed\n\n");
            return;
        }

        foreach ($list as $argument) {
            $out->out("  -  $argument\n");
        }
    }

    protected function showParameters(Input $inp, Output $out)
    {
        $out->out("Options:\n");
        $list = $inp->parameters->toArray();
        if (empty($list)) {
            $out->out("  No options passed\n\n");
            return;
        }

        foreach ($list as $option => $values) {
            $out->out("  -  $option:\n");
            foreach ($values as $value) {
                $out->out("    -  $value\n");
            }
        }
    }
}