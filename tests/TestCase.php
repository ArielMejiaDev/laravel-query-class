<?php

namespace ArielMejiaDev\LaravelQueryClass\Tests;

use ArielMejiaDev\LaravelQueryClass\LaravelQueryClassServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [LaravelQueryClassServiceProvider::class];
    }
}