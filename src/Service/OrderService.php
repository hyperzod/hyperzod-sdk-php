<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

use Hyperzod\HyperzodSdkPhp\Enums\HttpMethodEnum;

class OrderService extends AbstractService
{
   /**
    * Update order status
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function updateOrderStatus(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/admin/v1/order/update-order-status', $params);
   }

   /**
    * Fetch order
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *  
    */
   public function fetchOrder(array $params)
   {
      return $this->request(HttpMethodEnum::GET, '/admin/v1/order', $params);
   }

   /**
    * List order status
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function listOrderStatus(array $params)
   {
      return $this->request(HttpMethodEnum::GET, '/admin/v1/order/status/order', $params);
   }

   /**
    * Add Delivery Provider Data
    *
    * @param array $params
    *
    * @throws \Hyperzod\HyperzodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function addDeliveryProviderData(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/admin/v1/order/deliveryProvider', $params);
   }
}
