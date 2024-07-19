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

   /**
    * Get segment contact count
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function getSegmentContactCount(array $params)
   {
      return $this->request(HttpMethodEnum::GET, '/admin/v1/stats/segments/count', $params);
   }

   /**
    * Execute segment
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function executeSegment(array $params)
   {
      return $this->request(HttpMethodEnum::GET, '/admin/v1/stats/segments/execute', $params);
   }
}