<?php

namespace Hboie\EWSBundle;

use garethp\ews\API;
use garethp\ews\API\Enumeration\ExchangeVersionType;

class Factory
{
    /**
     * @var API $ewsAPI
     */
    private $ewsAPI;

    public function createEWS_API($config)
    {
        $server = $config['server'];
        $username = $config['username'];
        $password = $config['password'];
        $version = $config['version'];

        $options['drillDownResponses'] = false;

        if ( $version != "" ) {
            switch ( $version ) {
                case ExchangeVersionType::EXCHANGE_2007:
                    $options['version'] = ExchangeVersionType::EXCHANGE_2007;
                    break;

                case ExchangeVersionType::EXCHANGE_2007_SP1:
                    $options['version'] = ExchangeVersionType::EXCHANGE_2007_SP1;
                    break;

                case ExchangeVersionType::EXCHANGE_2010:
                    $options['version'] = ExchangeVersionType::EXCHANGE_2010;
                    break;

                case ExchangeVersionType::EXCHANGE_2010_SP1:
                    $options['version'] = ExchangeVersionType::EXCHANGE_2010_SP1;
                    break;

                case ExchangeVersionType::EXCHANGE_2010_SP2:
                    $options['version'] = ExchangeVersionType::EXCHANGE_2010_SP2;
                    break;

                case ExchangeVersionType::EXCHANGE_2013:
                    $options['version'] = ExchangeVersionType::EXCHANGE_2013;
                    break;

                case ExchangeVersionType::EXCHANGE_2013_SP1:
                    $options['version'] = ExchangeVersionType::EXCHANGE_2013_SP1;
                    break;
            }
        }

        $this->ewsAPI = API::withUsernameAndPassword($server, $username, $password, $options);
    }

    /**
     * @return API
     */
    public function getEWS_API()
    {
        return $this->ewsAPI;
    }
}