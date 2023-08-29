<?php

namespace illustrate\Facades;

use Symfony\Component\Console\Command\Command;

class Reactoor
{
    static function call($command,$call,$output):Command
    {
        $reactoor = new \illustrate\Console\Reactoor\Reactoor();
        return $reactoor->call($command,$call,$output);
    }
}

