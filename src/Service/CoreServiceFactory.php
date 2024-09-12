<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

/**
 * Service factory class for API resources in the root namespace.
 *
 * @property OrderService $orderService
 * @property AuthService $authService
 * @property WebhookService $webhookService
 * @property CatalogService $catalogService
 * @property StatsService $statsService
 * @property TenantService $tenantService
 * @property BillingService $billingService
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
        'stats' => StatsService::class,
        'tenant' => TenantService::class,
        'billing' => BillingService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
