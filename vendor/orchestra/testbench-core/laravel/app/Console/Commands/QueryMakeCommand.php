<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class QueryMakeCommand extends GeneratorCommand
{
    const SPATIE = 'spatie';
    const ELOQUENT = 'eloquent';

    protected array $baseClasses = [
        'Spatie Query Builder' => self::SPATIE,
        'Eloquent Query Builder' => self::ELOQUENT,
    ];

    protected string $selectedBaseClass;

    public function handle()
    {
        $this->askForABaseClass();
        return parent::handle();
    }

    public function askForABaseClass()
    {
        $option = $this->choice(
            'Select a base class to extend',
            array_keys($this->baseClasses),
        );
        $this->selectedBaseClass = $this->baseClasses[$option];
    }


    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:query';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new query builder class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Query builder class';

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name): string
    {
        $stub = parent::replaceClass($stub, $name);

        $className = class_basename(str_replace('\\', '/', $name));

        $modelName = $this->option('model') ?? Str::of($className)->remove('Query');

        $stub = str_replace('{{ model }}', $modelName, $stub);

        return str_replace('{{ name }}', $className, $stub);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        if ($this->selectedBaseClass === self::SPATIE) {
            return base_path('stubs/spatie-query.stub');
        }
        return base_path('stubs/eloquent-query.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Http\Queries';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the query builder class.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['model', 'm', InputOption::VALUE_REQUIRED, 'The name of the model related to the query builder class.'],
        ];
    }
}
