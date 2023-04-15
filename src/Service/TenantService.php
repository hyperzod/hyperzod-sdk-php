<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

use Hyperzod\HyperzodSdkPhp\Enums\HttpMethodEnum;

class TenantService extends AbstractService
{
   public function tenantBranding()
   {
      return $this->request(HttpMethodEnum::GET, '/public/v1/tenant/branding');
   }
}
