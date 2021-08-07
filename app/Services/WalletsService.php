<?php 

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\WalletsRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\DB;

class WalletsService
{
    public function __construct(
        WalletsRepository $walletsRepository,
        UsersRepository $usersRepository
    ) {
        $this->walletsRepository = $walletsRepository;
        $this->usersRepository = $usersRepository;
    }

    public function makeTransaction(Request $request)
    {       
        $payer = $this->usersRepository->find($request->payer);
        if(!$payer) {
            return response()->json(['message' => 'Payer not found'], 404);
        }

        if($payer->hasRole('lojista')) {
            return response()->json(['message' => 'Unauthorized transaction for this user'], 401);
        }

        $payee = $this->usersRepository->find($request->payee);
        if(!$payee) {
            return response()->json(['message' => 'Payee not found'], 404);
        }


        if(!$this->checkAccountAvailability($payer->id, $request->value)) {
            return response()->json(['message' => 'Insufficient funds'], 401);
        }

        // TODO: terminar as verificações, criar as transações, que salvam os registros das transactions e o serviço de envio de notificações com o cron e a respectiva tabela disso no banco de dados
        DB::transaction(function () use($payer, $payee, $request) {
            $payer_wallet = $this->decrementAmountWallet($payer->id, $request->value);
            $payee_wallet = $this->incrementAmountWallet($payee->id, $request->value);
        });  
        
        
        return response()->json(['message' => 'sucess'], 200);
    }

    private function incrementAmountWallet(int $user_id, float $value_transaction)
    {
        $wallet = $this->walletsRepository->findByUser($user_id);
        $this->walletsRepository->updateValue($wallet->id, $wallet->value + $value_transaction);
        
        return $wallet;
    }

    private function decrementAmountWallet(int $user_id, float $value_transaction)
    {
        $wallet = $this->walletsRepository->findByUser($user_id);
        $this->walletsRepository->updateValue($wallet->id, $wallet->value - $value_transaction);
        
        return $wallet;
    }

    private function validateUserPermissionTransaction(int $user_id)
    {
        $user = $this->usersRepository->find($user_id);
        $permission = $user->hasRole('lojista') ? true : false;

        return $permission;

    }

    private function checkAccountAvailability(int $user_id, float $value_transaction)
    {
        $wallet = $this->walletsRepository->findByUser($user_id);
        $availability = $wallet->value >= $value_transaction ? true : false;

        return $availability;
    }

}