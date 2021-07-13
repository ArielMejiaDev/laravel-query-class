<?php

namespace ArielMejiaDev\LaravelQueryClass\Tests\Unit;

use ArielMejiaDev\LaravelQueryClass\Tests\TestCase;

class InstallCommandTest extends TestCase
{
    /** @test */
    public function it_tests_the_package_can_be_installed(): void
    {
        $this->artisan('query-class:install');

        $this->assertTrue(
            file_exists(app_path('Console/Commands/QueryMakeCommand.php'))
        );

        $this->assertTrue(
            file_exists(app_path('Http/Queries/EloquentQuery.php'))
        );

        $this->assertTrue(
            file_exists(base_path('stubs/eloquent-query.stub'))
        );

        $this->assertTrue(
            file_exists(base_path('stubs/spatie-query.stub'))
        );
    }
}