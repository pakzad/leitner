<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @return string
     */
    public function getModelName(): string
    {
        return User::class;
    }

    /**
     * @param array $parameters
     * @return Model
     */
    public function create(array $parameters): Model
    {
        return parent::create($parameters);
    }

    /**
     * @param Model $model
     * @param array $parameters
     * @return Model
     */
    public function update(Model $model, array $parameters): Model
    {
        return parent::update($model, $parameters);
    }

    /**
     * @param array $parameters
     * @return bool
     */
    public function changePassword(array $parameters): bool
    {
        $user = Auth::user();

        $parameters['password'] = Hash::make(trim($parameters['password']));
        $user->update($parameters);

        return true;
    }
}
