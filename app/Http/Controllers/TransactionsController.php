<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WalletsService;

class TransactionsController extends Controller
{
    public function __construct(
        WalletsService $walletsService
    ) {
        $this->walletsService = $walletsService;
    }

    public function transaction(Request $request)
    {
        $this->validate($request, [
            'value' => 'required|numeric',
            'payer' => 'required|integer',
            'payee' => 'required|integer'
        ]);

        $response = $this->walletsService->makeTransaction($request);

        return $response;
    }

}