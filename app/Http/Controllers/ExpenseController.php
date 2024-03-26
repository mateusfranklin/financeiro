<?php

namespace App\Http\Controllers;

use App\Constants\AccountType;
use App\Constants\Status;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    private $user;
    private $statuses;
    private $accountTypes;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });

        $this->statuses = [
            Status::Active => 'Ativo',
            Status::Inactive => 'Desativado',
            Status::NotShowing => 'Não exibido',
            Status::Pending => 'Pendente',
            Status::Paid => 'Pago',
            Status::Overdue => 'Atrasado',
            Status::Cancelled => 'Cancelado',

        ];

        $this->accountTypes = [
            AccountType::PersonalAccount => 'Conta Pessoal',
            AccountType::BusinessAccount => 'Conta Empresarial',
            AccountType::SavingsAccount => 'Conta Poupança',
            AccountType::CreditCard => 'Cartão de Crédito',
            AccountType::Loan => 'Empréstimo',
            AccountType::Investment => 'Investimento',
            AccountType::Other => 'Outro',
        ];
    }

    public function create($data)
    {
        Expense::create([
            'user_id' => $this->user->id,
            'category_id' => $data['category_id'],
            'bank_id' => $data['bank_id'],
            'status_id' => $data['status_id'],
            'payment_id' => $data['payment_id'],
            'description' => $data['description'],
            'amount' => $data['amount'],
            'due_date' => $data['due_date'],
            'notes' => $data['notes'],
            'repeat' => $data['repeat'],
        ]);
    }

    public function update($data)
    {
        Expense::find($data['update'])->update([
            'category_id' => $data['category_id'],
            'bank_id' => $data['bank_id'],
            'status_id' => $data['status_id'],
            'payment_id' => $data['payment_id'],
            'description' => $data['description'],
            'amount' => $data['amount'],
            'due_date' => $data['due_date'],
            'notes' => $data['notes'],
            'repeat' => $data['repeat'],
        ]);
    }

    public function destroy($id)
    {
        Expense::find($id)->delete();
    }
}
