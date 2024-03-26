<?php

namespace App\Http\Controllers;

use App\Constants\AccountType as ConstAccountType;
use App\Constants\Status as ConstStatus;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    private $user;
    private $statuses = [];
    private $accountTypes = [];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->statuses = [
            ConstStatus::Active => 'Ativo',
            ConstStatus::Inactive => 'Desativado',
        ];

        $this->accountTypes = [
            ConstAccountType::PersonalAccount => 'Conta Pessoal',
            ConstAccountType::BusinessAccount => 'Conta Empresarial',
            ConstAccountType::SavingsAccount => 'Conta Poupança',
            ConstAccountType::CreditCard => 'Cartão de Crédito',
            ConstAccountType::Loan => 'Empréstimo',
            ConstAccountType::Investment => 'Investimento',
            ConstAccountType::Other => 'Outro',
        ];
    }
    //
    public function index()
    {
        $banks = Bank::all();
        $statuses = $this->statuses;
        $accountTypes = $this->accountTypes;

        return view('config.bank', compact(['banks', 'statuses', 'accountTypes']));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'update' => 'required',
            'status_id' => 'required',
            'account_type_id' => 'required',
            'name' => 'required',
            'icon' => 'nullable',
            'balance' => 'nullable',
        ]);

        if ($data['update'] > 0) {
            $this->update($data);
            return redirect()->route('bank.index');
        }

        Bank::create([
            'user_id' => $this->user->id,
            'status_id' => $data['status_id'] ?? ConstStatus::Active,
            'account_type_id' => $data['account_type_id'] ?? ConstAccountType::PersonalAccount,
            'name' => $data['name'],
            'icon' => $data['icon'],
            'balance' => $data['balance'],
        ]);

        return redirect()->route('bank.index');
    }

    public function update($data)
    {
        Bank::find($data['update'])->update([
            'status_id' => $data['status_id'],
            'account_type_id' => $data['account_type_id'],
            'name' => $data['name'],
            'icon' => $data['icon'],
            'balance' => $data['balance'],
        ]);
    }

    public function destroy($bank_id)
    {
        Bank::find($bank_id)->delete();
        return redirect()->route('bank.index');
    }
}
