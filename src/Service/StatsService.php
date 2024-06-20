<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

use Hyperzod\HyperzodSdkPhp\Enums\HttpMethodEnum;

class StatsService extends AbstractService
{
   /**
    * Get segments
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function listSegments(array $params = [])
   {
      return $this->request(HttpMethodEnum::GET, '/admin/v1/stats/segments', $params);
   }
}
