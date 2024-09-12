<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

use Hyperzod\HyperzodSdkPhp\Enums\HttpMethodEnum;

class BillingService extends AbstractService
{
   /**
    * Create Payment - Tenant Billing
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function createPayment(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/admin/v1/billing/tenant/payment', $params);
   }

   /**
    * Verify Payment - Tenant Billing
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
    public function verifyPayment(array $params)
    {
        return $this->request(HttpMethodEnum::GET, '/admin/v1/billing/tenant/payment', $params);
    }
}