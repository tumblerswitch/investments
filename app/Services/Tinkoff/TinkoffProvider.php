<?php

namespace App\Services\Tinkoff;

use jamesRUS52\TinkoffInvest as Invest;

class TinkoffProvider
{
    public function __construct()
    {
    }

    /**
     * @return float
     * @throws Invest\TIException
     */
    public function connect(): float
    {
        $client = new Invest\TIClient(env('TOKEN_TINKOFF_API'),Invest\TISiteEnum::SANDBOX);
        $client->sbCurrencyBalance(500,Invest\TICurrencyEnum::USD);
        $client->sbRegister();

        $port = $client->getPortfolio();
        $balance = $port->getCurrencyBalance(Invest\TICurrencyEnum::USD);

        return $balance ?? 0 ;
    }
}
