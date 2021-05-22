<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    /**
     * __constructor
     *
     * @param Model $model instance of Model @see Illuminate\Database\Eloquent\Model
     */
    public function __construct(public Model $model)
    {
        $this->model = $model;
    }

    public function create($credential) :Model
    {
        return $this->model->create($credential);
    }

    public function find($id) :?Model
    {
        return $this->model->findOrFail($id);
    }

    public function update($credential)
    {
        return $this->model->update($credential);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function all() :Collection
    {
        return $this->model->all();
    }

    public function filter($filters) :Collection
    {
        return $this->model->where($filters);
    }

    public function updateOrCreate($oldCredentials, $newCredentials)
    {
        return $this->model->updateOrCreate($oldCredentials, $newCredentials);
    }

    public function firstOrCreate($credentials)
    {
        return $this->model->firstOrCreate($credentials);
    }

    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        return $this->model->where($column, $operator = null, $value = null, $boolean = 'and');
    }

    public function whereIn($columnName, $columnValues)
    {
        return $this->model->whereIn($columnName, $columnValues);
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function first()
    {
        return $this->model->first();
    }

    public function query()
    {
        return $this->model->query();
    }

    public function getFirstModelWhere($columnName, $columnValue)
    {
        return $this->model->firstWhere($columnName, $columnValue);
    }

    public function getFilteredRelationToQuery(Builder $modelQuery, $relationName, $columnName, $columnValue)
    {
        return $modelQuery->whereHas($relationName, function ($query) use($columnName, $columnValue) {
                                $query->where($columnName, $columnValue);
                            })
                            ->with($relationName, function ($query) use($columnName, $columnValue) {
                                $query->where($columnName, $columnValue);
                            });;
    }
}
