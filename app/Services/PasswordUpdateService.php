<?php

namespace App\Services;

use App\Repositories\PasswordUpdateRepository;

class PasswordUpdateService
{
    protected $PasswordUpdateRepository;

    public function __construct(PasswordUpdateRepository $PasswordUpdateRepository)
    {
        $this->PasswordUpdateRepository = $PasswordUpdateRepository;
    }

    public function updatePassword(array $data)
    {
        return $this->PasswordUpdateRepository->updatePassword($data);
    }
}
