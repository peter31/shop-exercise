<?php

namespace Advert\Traits;

use Advert\Manager\AdvertManager;

trait GetAdvertManagerTrait
{
    /** @var AdvertManager */
    protected $advertManager;

    /**
     * @return AdvertManager
     */
    protected function getAdvertManager()
    {
        if (null === $this->advertManager) {
            $this->advertManager = new AdvertManager();
        }

        return $this->advertManager;
    }
}
