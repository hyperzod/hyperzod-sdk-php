<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

/**
 * Service factory class for API resources in the root namespace.
 *
 * @property OrderService $orderService
 * @property AuthService $authService
 * @property WebhookService $webhookService
 */
class CoreServiceFactory extends AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'order' => OrderService::class,
        'auth' => AuthService::class,
        'webhook' => WebhookService::class,
        'catalog' => CatalogService::class,
        'tenant' => TenantService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
