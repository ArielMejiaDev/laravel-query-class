<?php

namespace ArielMejiaDev\LaravelQueryClass\Tests;

use ArielMejiaDev\LaravelQueryClass\LaravelQueryClassServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMockingConsoleOutput();
    }

    protected function getPackageProviders($app): array
    {
        return [LaravelQueryClassServiceProvider::class];
    }
}