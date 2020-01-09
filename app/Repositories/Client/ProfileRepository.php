<?php


namespace App\Repositories\Client;


use App\Exceptions\NotFoundException;
use App\Models\User;

class ProfileRepository implements ProfileRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function update()
    {
        $this->user->update();
    }

    public function find($id)
    {
        $user = $this->user->find($id);
        if (!$user) {
            throw new NotFoundException();
        }

        return $user;
    }
}