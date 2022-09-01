<?php

namespace Hyperzod\HyperzodSdkPhp\Client;

/**
 * Interface for a Hyperzod client.
 */
interface BaseHyperzodClientInterface
{
   /**
    * Gets the API key used by the client to send requests.
    *
    * @return null|string the API key used by the client to send requests
    */
   public function getApiKey();

   /**
    * Gets the base URL for Hyperzod's API.
    *
    * @return string the base URL for Hyperzod's API
    */
   public function getApiBase();
}
