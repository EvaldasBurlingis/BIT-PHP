<?php declare(strict_types = 1);

require __DIR__ . '/vendor/autoload.php';

use Codedungeon\PHPCliColors\Color;

function getGreenLine() : void
{
    echo Color::GREEN, '========================================', Color::RESET . PHP_EOL;
}

function init() : void
{
    echo Color::BLUE, 'Hello, this is multiplication table generator that works in your CLI', Color::RESET  . PHP_EOL;
    echo Color::BLUE, 'Please enter any digit and we will genereate multiplication table for it', Color::RESET . PHP_EOL;
    getGreenLine();
    echo Color::BLUE, 'To start enter any number, if you want to exit type exit', Color::RESET . PHP_EOL;
    getNumber();
}

function getNumber()
{
    echo Color::GREEN, 'enter (number/exit)', Color::RESET . PHP_EOL;
    $input = readline();

    if ($input === 'exit') return exitCLI();
    if ((int)$input === 0) return getNumber();
    return generateMultiplicationTable((int)$input);
    
}

function exitCLI() : void
{
    getGreenLine();
    echo Color::BLUE, 'Goodbye', Color::RESET  . PHP_EOL;
}

function generateMultiplicationTable(int $num) : void
{
    getGreenLine();

    for ($i = 0; $i <= $num; $i++) {
        echo Color::BLUE, $i . ' x ' . $num . ' = ' . ($i * $num), Color::RESET . PHP_EOL;
    }
    
    getGreenLine();
    getNumber();
}

init();

