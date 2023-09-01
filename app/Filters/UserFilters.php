<?php

namespace App\Filters;

use App\Enums\SortableEnum;
use \Illuminate\Database\Eloquent\Builder;

class UserFilters extends Filters
{
    /**
     * @var string[]
     */
    protected array $filters = ['search', 'order', 'trashed'];

    /**
     * @param $value
     * @return Builder
     */
    protected function order($value): Builder
    {
        switch ($value) {
            case strtolower(SortableEnum::ASCENDING->name):
                return $this->builder->orderBy('created_at', SortableEnum::ASCENDING());
            case strtolower(SortableEnum::DESCENDING->name):
                return $this->builder->orderBy('created_at', SortableEnum::ACTIVE());
            default:
                abort(403, __(sprintf('The given status value "%s" is not allowed.', $value)));
        }

        return $this->builder;
    }

    /**
     * @param $value
     * @return Builder
     */
    protected function search($value): Builder
    {
        return $this->builder
            ->where('name', 'LIKE', "%{$value}%")
            ->where('username', 'LIKE', "%{$value}%")
            ->orWhere('email', 'LIKE', "%{$value}%");
    }

    /**
     * @param $value
     * @return Builder
     */
    protected function trashed($value): Builder
    {
        return $this->builder->withTrashed();
    }
}
