<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

use Hyperzod\HyperzodSdkPhp\Enums\HttpMethodEnum;

class WebhookService extends AbstractService
{
   /**
    * Create webhook
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function create(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/admin/v1/webhook/tenant/webhooks', $params);
   }
}
