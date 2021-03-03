<?php


namespace Argila\Engine\General;


class Factory
{
    public function __invoke($className)
    {
        return new $className();
    }
}