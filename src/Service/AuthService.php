<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

use Hyperzod\HyperzodSdkPhp\Enums\HttpMethodEnum;

class AuthService extends AbstractService
{
   /**
    * Get logged in user
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function me(array $params)
   {
      return $this->request(HttpMethodEnum::GET, '/auth/v1/me', $params);
   }
}
