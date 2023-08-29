<?php

namespace illustrate\Console\Reactoor;

use illustrate\Console\Console;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Process\Process;

class Reactoor extends Command
{
    public function call(string $command, string $call,bool $output): mixed
    {
        $reactoor = new Process(['php', 'reactoor', $command,$call ?? null]);
        $reactoor->start();
        if ($output == true){
            echo $reactoor->getOutput();
        }else{
            return '';
        }
        return $reactoor->isTerminated();
    }
}