<?php

namespace Hyperzod\HyperzodSdkPhp\Service;

/**
 * Abstract base class for all services.
 */
abstract class AbstractService
{
   /**
    * @var \Hyperzod\HyperzodSdkPhp\Client\HyperzodClientInterface
    */
   protected $client;

   /**
    * Initializes a new instance of the {@link AbstractService} class.
    *
    * @param \Hyperzod\HyperzodSdkPhp\Client\HyperzodClientInterface $client
    */
   public function __construct($client)
   {
      $this->client = $client;
   }

   /**
    * Gets the client used by this service to send requests.
    *
    * @return \Hyperzod\HyperzodSdkPhp\Client\HyperzodClientInterface
    */
   public function getClient()
   {
      return $this->client;
   }

   protected function request(string $method, string $path, array $params = [])
   {
      return $this->getClient()->request($method, $path, $params);
   }
}
