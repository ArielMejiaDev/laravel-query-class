<?php

namespace ArielMejiaDev\LaravelQueryClass;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    protected $signature = 'query-class:install';

    protected $description = 'It install all the query class stubs.';

    public function __construct()
    {
        parent::__construct();

        if (file_exists(app_path('Console/Commands/QueryMakeCommand.php')))
        {
            $this->setHidden(true);
        }
    }

    public function handle(): int
    {
        // Publishing commands
        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/Commands', app_path('Console/Commands'));

        // Query base class
        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/Queries', app_path('Http/Queries'));

        // Publishing the stubs.
        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/stubs', base_path('stubs'));

        $this->info('Query class package installed successfully.');
        return 0;
    }
}
