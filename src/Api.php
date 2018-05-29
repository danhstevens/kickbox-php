<?php

namespace Kickbox;

class Api {
  
  /**
   * @var VerificationApi
   */
  public $Verification;

  /**
   * @var TrustApi
   */
  public $Trust;

  /**
   * Initialize Kickbox API
   *
   * @param string $apiKey your Kickbox API key
   */
  function __construct($apiKey) {
    $config = Configuration::getDefaultConfiguration()->setApiKey('apikey', $apiKey);

    $this->Verification = new Api\VerificationApi(new \GuzzleHttp\Client(), $config);
    $this->Trust = new Api\TrustApi(new \GuzzleHttp\Client(), $config);
  }
}