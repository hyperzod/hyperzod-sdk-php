<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

use Hyperzod\HyperzodSdkPhp\Enums\HttpMethodEnum;

class NotificationService extends AbstractService
{
   /**
    * Create webhook
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function send(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/admin/v1/notification/send', $params);
   }
}
