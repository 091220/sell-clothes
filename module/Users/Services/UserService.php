<?php

namespace Module\Users\Services;

use Module\Users\Repositories\UserRepository;

class UserService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getModel()->paginate(5);
    }

}
