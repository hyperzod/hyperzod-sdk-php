<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

/**
 * Service factory class for API resources in the root namespace.
 *
 * @property OrderService $orderService
 */
class CoreServiceFactory extends AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'order' => OrderService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
