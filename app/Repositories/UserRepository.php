<?php
/**
 * Created by PhpStorm.
 * User: tarikhagustua
 * Date: 3/29/2019
 * Time: 7:07 PM
 */

namespace App\Repositories;


use App\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getTotalUser()
    {
        return $this->user->select('id')->count();
    }
}