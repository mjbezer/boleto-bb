<?php

namespace Mjbezer\BBBoleto;

/**
 * Class Environment
 *
 * @package Mjbezer\BBBoleto
 */

class Environment {
    private $token;

    private $apiQuery;

    private $authorize;

    /**
     * Environment constructor.
     *
     * @param $token
     * @param $apiQuery
     */
    private function __construct($authorize, $token, $apiQuery)
    {
        $this->token      = $token;
        $this->apiQuery   = $apiQuery;
        $this->authorize  = $authorize;
    }

    /**
     * @return Environment
     */
    public static function sandbox()
    {
        $authorize  = 'https://oauth.sandbox.bb.com.br/ui/authorize';
        $token      = 'https://oauth.sandbox.bb.com.br/oauth/token/';
        $apiQuery   = 'https://apiquerysandbox.cieloecommerce.cielo.com.br/';

        return new Environment($authorize, $token, $apiQuery);
    }

    /**
     * @return Environment
     */
    public static function production()
    {
        $authorize  = 'https://oauth.bb.com.br/ui/authorize';
        $token      = 'https://oauth.bb.com.br/oauth/token/';
        $apiQuery   = 'https://apiquery.cieloecommerce.cielo.com.br/';

        return new Environment($authorize, $token, $apiQuery);
    }

     /**
     * Gets the environment's Token URL
     *
     * @return string the Token URL
     */
    public function getAuthorizeUrl()
    {
        return $this->authorize;
    }

    /**
     * Gets the environment's Token URL
     *
     * @return string the Token URL
     */
    public function getTokenUrl()
    {
        return $this->token;
    }

    /**
     * Gets the environment's Api Query URL
     *
     * @return string Api Query URL
     */
    public function getApiQueryURL()
    {
        return $this->apiQuery;
    }
}
