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

   public function users(array $params)
   {
      return $this->request(HttpMethodEnum::GET, '/auth/v1/user/all', $params);
   }

   public function showUser(int $user_id, array $params)
   {
      return $this->request(HttpMethodEnum::GET, '/auth/v1/user/' . $user_id, $params);
   }

   public function searchUser(array $params)
   {
      return $this->request(HttpMethodEnum::GET, '/auth/v1/user/search', $params);
   }
}
