<?php

namespace Kickbox;

class Api {
  
  /**
   * @var VerificationApi
   */
  public $verification;

  /**
   * @var TrustApi
   */
  public $trust;

  /**
   * Initialize Kickbox API
   *
   * @param string $apiKey your Kickbox API key
   */
  function __construct($apiKey) {
    $config = Configuration::getDefaultConfiguration()->setApiKey('apikey', $apiKey);

    $this->verification = new Api\VerificationApi(new \GuzzleHttp\Client(), $config);
    $this->trust = new Api\TrustApi(new \GuzzleHttp\Client(), $config);
  }
}