<?php

namespace App\Repositories;

use App\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * @return string
     */
    public function getModelName(): string
    {
        return 'NoModel';
    }

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return app($this->getModelName());
    }

    /**
     * @param Filters $filters
     * @param array $queries
     * @param array $relations
     * @return LengthAwarePaginator|Collection
     */
    public function list(Filters $filters, array $queries = [], array $relations = []): LengthAwarePaginator|Collection
    {
        $models = $this->getModel()->query()
            ->filter($filters)
            ->with($relations);

        return $this->applyQuery($models, $queries)->get();
    }

    /**
     * @param Model $model
     * @return Model
     */
    public
    function show(Model $model): Model
    {
        return $model;
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public
    function find(int $id): ?Model
    {
        return $this->getModel()->query()->find($id);
    }

    /**
     * @param array $parameters
     * @return Model
     */
    public
    function create(array $parameters): Model
    {
        /** @var Model $model */
        $model = $this->getModel()->query()
            ->create($parameters);

        return $model;
    }

    /**
     * @param Model $model
     * @param array $parameters
     * @return Model
     */
    public
    function update(Model $model, array $parameters): Model
    {
        $model->update($parameters);

        return $model->refresh();
    }

    /**
     * @param Model $model
     * @return bool
     */
    public
    function destroy(
        Model $model
    ): bool
    {
        return $model->delete();
    }

    /**
     * @param Builder $models
     * @param array $queries
     * @return Builder
     */
    public function applyQuery(Builder $models, array $queries = []): Builder
    {
        return $models;
    }
}
