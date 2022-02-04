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

    public function create($user)
    {
        $this->userRepository->create($user);
    }

    public function getById($id)
    {
        return $this->userRepository->getById($id);
    }

    public function edit($user, $id)
    {
        $this->userRepository->getById($id)->update($user);
    }

    public function delete($id)
    {
        $this->userRepository->getById($id)->delete();
    }

    public function lock($id)
    {
        $this->userRepository->getById($id)->update(['is_locked' => '1']);
    }

}
