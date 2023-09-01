<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property Collection<User> $User
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property mixed $username
 */
class UserResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */

    #[ArrayShape([
        'id'         => "int",
        'name'       => "string",
        'username'   => "mixed",
        'email'      => "string",
    ])]
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'first'      => $this->name,
            'username'   => $this->username,
            'email'      => $this->email,
        ];
    }
}
