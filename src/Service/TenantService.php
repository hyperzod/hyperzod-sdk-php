<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

use Hyperzod\HyperzodSdkPhp\Enums\HttpMethodEnum;

class TenantService extends AbstractService
{
   /**
    * Validate tenant
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function validateTenant(array $params)
   {
      return $this->request(HttpMethodEnum::GET, '/public/v1/tenant/validate', $params);
   }
}
