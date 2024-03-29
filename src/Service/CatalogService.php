<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

use Hyperzod\HyperzodSdkPhp\Enums\HttpMethodEnum;

class CatalogService extends AbstractService
{
   public function listProducts(string $merchant_id = null)
   {
      $params = [];

      if ($merchant_id) {
         $params['merchant_id'] = $merchant_id;
      }

      return $this->request(HttpMethodEnum::GET, '/admin/v1/catalog/product/list', $params);
   }
}
