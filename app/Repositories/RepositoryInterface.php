<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function create($credentials) :Model;
    public function find($id) :?Model;
    public function update($credentials);
    public function destroy($id);
    public function all() :Collection;
    public function filter($filters) :Collection;
    public function updateOrCreate($oldCredentials, $newCredentials);
    public function firstOrCreate($credentials);
    public function where($column, $operator = null, $value = null, $boolean = 'and');
    public function whereIn($columnName, $columnValues);
    public function with($relations);
    public function first();
    public function query();
    public function getFirstModelWhere($columnName, $columnValue);
}