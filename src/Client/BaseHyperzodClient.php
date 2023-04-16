<?php

namespace Hyperzod\HyperzodSdkPhp\Client;

use Exception;
use GuzzleHttp\Client;
use Hyperzod\HyperzodSdkPhp\Enums\EnvironmentEnum;
use Hyperzod\HyperzodSdkPhp\Exception\InvalidArgumentException;

class BaseHyperzodClient implements HyperzodClientInterface
{
   const DEV_API_BASE = 'https://api.hyperzod.dev';
   const PRODUCTION_API_BASE = 'https://api.hyperzod.app';

   protected string $api_base;
   protected int $tenant_id;
   protected string $api_key;
   protected ?string $auth_token = null;
   protected EnvironmentEnum $env;

   /**
    * Initializes a new instance of the {@link BaseHyperzodClient} class.
    *
    * The constructor takes two arguments.
    * @param string $api_key the API key of the client
    * @param string $env the environment
    */

   public function __construct(int $tenant_id, string $api_key, bool $is_prod_env = true)
   {
      $this->tenant_id = $tenant_id;

      $this->api_key = $this->validateApiKey($api_key);

      $this->env = EnvironmentEnum::DEV;
      $this->api_base = self::DEV_API_BASE;
      if ($is_prod_env) {
         $this->env = EnvironmentEnum::PRODUCTION;
         $this->api_base = self::PRODUCTION_API_BASE;
      }
   }

   /**
    * Gets the API key used by the client to send requests.
    *
    * @return null|string the API key used by the client to send requests
    */
   public function getApiKey()
   {
      return $this->api_key;
   }

   /**
    * Gets the base URL for Hyperzod's API.
    *
    * @return string the base URL for Hyperzod's API
    */
   public function getApiBase()
   {
      return $this->api_base;
   }

   /**
    * Gets the env.
    *
    * @return string the env
    */
   public function getEnv()
   {
      return $this->env;
   }

   /**
    * Gets the token.
    *
    * @return string|null the token
    */
   public function getAuthToken()
   {
      return $this->auth_token;
   }

   /**
    * Sets the token.
    *
    * @param string|null $token the token
    */

   public function setAuthToken(string $token)
   {
      $this->auth_token = $token;
   }

   /**
    * Sends a request to Hyperzod's API.
    *
    * @param string $method the HTTP method
    * @param string $path the path of the request
    * @param array $params the parameters of the request
    */

   public function request($method, $path, array $params = [])
   {
      if (empty($this->tenant_id)) {
         throw new Exception("Tenant Id is required to access hyperzod's api's.");
      }

      $headers = [
         'Content-Type' => 'application/json',
         'Accept' => 'application/json',
         'x-tenant' => $this->tenant_id,
      ];

      $auth_token = $this->getAuthToken();
      if (!is_null($auth_token)) {
         $headers["Authorization"] = "Bearer " . $auth_token;
      } else {
         $params["apikey"] = $this->getApiKey();
      }

      $client = new Client([
         'headers' => $headers
      ]);

      $api = $this->getApiBase() . $path;
      $response = $client->request($method, $api, [
         'http_errors' => true,
         'body' => json_encode($params)
      ]);

      return $this->validateResponse($response);
   }

   /**
    * @param array<string, mixed> $config
    *
    * @throws InvalidArgumentException
    */
   private function validateApiKey(string $api_key)
   {
      // api_key
      if (!isset($api_key)) {
         throw new InvalidArgumentException('api_key field is required');
      }

      if (!is_string($api_key)) {
         throw new InvalidArgumentException('api_key must be a string');
      }

      if ('' === $api_key) {
         throw new InvalidArgumentException('api_key cannot be an empty string');
      }

      if (preg_match('/\s/', $api_key)) {
         throw new InvalidArgumentException('api_key cannot contain whitespace');
      }


      return $api_key;
   }

   private function validateResponse($response)
   {
      $status_code = $response->getStatusCode();

      if ($status_code >= 200 && $status_code < 300) {
         $response = json_decode($response->getBody(), true);
         if (isset($response["success"]) && boolval($response["success"])) {
            if (isset($response["data"])) {
               return $response["data"];
            }
            if (isset($response["message"])) {
               return $response["message"];
            }
            throw new Exception("Data node or message node not set in server response");
         }
         if (isset($response["success"]) && !boolval($response["success"])) {
            $message = null;
            if (isset($response["message"])) {
               $message = $response["message"];
            }
            if (isset($response["data"])) {
               $message = $message . json_encode($response["data"]);
            }
            throw new Exception($message);
         }
      }

      throw new Exception("Error Processing Response");
   }
}
