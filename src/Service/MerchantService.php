<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

use Hyperzod\HyperzodSdkPhp\Enums\HttpMethodEnum;

class MerchantService extends AbstractService
{
   public function listMerchants(array $params = [])
   {
      return $this->request(HttpMethodEnum::GET, '/admin/v1/merchant/listByIds', $params);
   }
}
