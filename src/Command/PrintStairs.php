<?php

namespace RusinovArtem\ConsoleAppExample\Command;

use RusinovArtem\Console\Command\Command;
use RusinovArtem\Console\Input;
use RusinovArtem\Console\Output;

class PrintStairs extends Command
{
    public int $begin = 0;
    public int $end = 104;
    public int $currentValue = 0;
    public int $pad;

    public static function getDescription(): string
    {
        return "Print number stairs";
    }

    public static function getHelp(string $entryPoint, string $command): string
    {
        return <<<TEXT
      Print stairs like this:
      0
      1 2
      3 4 5
      and takes parameters 'begin' and 'end':
         php $entryPoint $command [begin=0] [end=1000]
      TEXT;
    }


    public function run(Input $inp, Output $out): int
    {
        if ($inp->parameters->has('begin')) {
            $this->begin = $inp->parameters->first('begin');
        }

        if ($inp->parameters->has('end')) {
            $this->end = $inp->parameters->first('end');
        }

        $this->currentValue = $this->begin;

        $this->pad = strlen((string)$this->end);

        $line = 1;
        while ($this->currentValue <= $this->end) {
            $this->printLine($line++, $out);
        }
        $this->currentValue = $this->begin;
        return 0;
    }

    protected function printLine(int $lineNumber, Output $out)
    {
        for ($i = 1; $i <= $lineNumber; ++$i) {
            $out->out(str_pad((string)$this->currentValue++, $this->pad));
            if ($this->currentValue > $this->end) {
                break;
            }
            if ($i != $lineNumber) {
                $out->out(" ");
            }
        }
        $out->out("\n");
    }
}