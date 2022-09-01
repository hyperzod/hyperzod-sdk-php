<?php

namespace Hyperzod\HyperzodSdkPhp\Client;

use Hyperzod\HyperzodSdkPhp\Service\CoreServiceFactory;

class HyperzodClient extends BaseHyperzodClient
{
    /**
     * @var CoreServiceFactory
     */
    private $coreServiceFactory;

    public function __get($name)
    {
        if (null === $this->coreServiceFactory) {
            $this->coreServiceFactory = new CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->__get($name);
    }
}
