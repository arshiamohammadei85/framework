<?php

namespace illustrate\Console\Builder;

use Symfony\Component\Console\Command\Command;

class BaseBuilder extends Command
{
    public $command = [];

    public function call(mixed $callback): mixed
    {
        return new $callback;
    }

    public function add(mixed $command, string $name, string $help = null): mixed
    {

        return;
    }
}