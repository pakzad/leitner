<?php

namespace App\Repositories\Contracts;

use App\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param array $parameters
     * @return bool
     */
    public function changePassword(array $parameters): bool;
}
