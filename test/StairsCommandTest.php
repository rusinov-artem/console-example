<?php

namespace RusinovArtem\ConsoleAppExample\Test;

use PHPUnit\Framework\TestCase;
use RusinovArtem\Console\BuildInput;
use RusinovArtem\ConsoleAppExample\Command\PrintStairs;

class StairsCommandTest extends TestCase
{
    public function test_CanPrintStairs() {
        $inp = BuildInput::from("debug", "");
        $out = new OutSpy();
        $command = new PrintStairs();
        $command->run($inp, $out);
        $expected = <<<TEXT
        0  
        1   2  
        3   4   5  
        6   7   8   9  
        10  11  12  13  14 
        15  16  17  18  19  20 
        21  22  23  24  25  26  27 
        28  29  30  31  32  33  34  35 
        36  37  38  39  40  41  42  43  44 
        45  46  47  48  49  50  51  52  53  54 
        55  56  57  58  59  60  61  62  63  64  65 
        66  67  68  69  70  71  72  73  74  75  76  77 
        78  79  80  81  82  83  84  85  86  87  88  89  90 
        91  92  93  94  95  96  97  98  99  100 101 102 103 104
        
        TEXT;

        self::assertEquals($expected, $out->stdout);
    }

    public function test_CanPrintStairs90() {
        $inp = BuildInput::from("debug", "[end=90]");
        $out = new OutSpy();
        $command = new PrintStairs();
        $command->run($inp, $out);
        $expected = <<<TEXT
        0 
        1  2 
        3  4  5 
        6  7  8  9 
        10 11 12 13 14
        15 16 17 18 19 20
        21 22 23 24 25 26 27
        28 29 30 31 32 33 34 35
        36 37 38 39 40 41 42 43 44
        45 46 47 48 49 50 51 52 53 54
        55 56 57 58 59 60 61 62 63 64 65
        66 67 68 69 70 71 72 73 74 75 76 77
        78 79 80 81 82 83 84 85 86 87 88 89 90
        
        TEXT;

        self::assertEquals($expected, $out->stdout);
    }
}