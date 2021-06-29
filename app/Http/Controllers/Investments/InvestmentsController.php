<?php


namespace App\Http\Controllers\Investments;

use App\Services\Tinkoff\TinkoffProvider;


class InvestmentsController
{
    /**
     * @param TinkoffProvider $tinkoffProvider
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \jamesRUS52\TinkoffInvest\TIException
     */
    public function index(TinkoffProvider $tinkoffProvider)
    {
        $temp = $tinkoffProvider->connect();

        return view('portfolio',
            [
                'temp' => $temp
            ]);
    }
}
