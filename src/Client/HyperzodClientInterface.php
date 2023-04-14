<?php

namespace Hyperzod\HyperzodSdkPhp\Client;

/**
 * Interface for a Hyperzod client.
 */
interface HyperzodClientInterface extends BaseHyperzodClientInterface
{
   /**
    * Sends a request to Hyperzod's API.
    *
    * @param string $method the HTTP method
    * @param string $path the path of the request
    * @param array $params the parameters of the request
    */
   public function request($method, $path, array $params = []);
}
