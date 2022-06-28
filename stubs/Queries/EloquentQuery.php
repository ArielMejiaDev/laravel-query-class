<?php

namespace App\Http\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

abstract class EloquentQuery
{
    /**
     * @var User|Builder
     */
    protected $query;

    public function __call($name, $arguments)
    {
        return $this->query->{$name}(...$arguments);
    }
}
