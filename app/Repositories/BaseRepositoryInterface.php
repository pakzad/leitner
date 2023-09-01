<?php

namespace App\Repositories;

use App\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    /**
     * @param Filters $filters
     * @param array $queries
     * @param array $relations
     * @return LengthAwarePaginator|Collection
     */
    public function list(Filters $filters, array $queries = [], array $relations = []): LengthAwarePaginator|Collection;

    /**
     * @param Model $model
     * @return Model
     */
    public function show(Model $model): Model;

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model;

    /**
     * @param array $parameters
     * @return Model
     */
    public function create(array $parameters): Model;

    /**
     * @param Model $model
     * @param array $parameters
     * @return Model
     */
    public function update(Model $model, array $parameters): Model;

    /**
     * @param Model $model
     * @return bool
     */
    public function destroy(Model $model): bool;

    /**
     * @param Builder $models
     * @param array $queries
     * @return Builder
     */
    public function applyQuery(Builder $models, array $queries = []): Builder;
}
