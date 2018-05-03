<?php

namespace User\Traits;

use User\Manager\UserManager;

trait GetUserManagerTrait
{
    /** @var UserManager */
    protected $userManager;

    /**
     * @return UserManager
     */
    protected function getUserManager()
    {
        if (null === $this->userManager) {
            $this->userManager = new UserManager();
        }

        return $this->userManager;
    }
}
