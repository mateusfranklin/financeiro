<?php

namespace App\Http\Controllers;

use App\Constants\Status;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    private $user;
    private $statuses;

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
    }

    public function create($data)
    {
        Income::create([
            'user_id' => $this->user->id,
            'bank_id' => $data['bank_id'],
            'status_id' => $data['status_id'] ?? $this->statuses[Status::Paid],
            'payment_id' => $data['payment_id'] ?? null,
            'company' => $data['company'],
            'notes' => $data['notes'] ?? '',
            'amount' => $data['amount'],
            'due_date' => $data['due_date'],
            'repeat' => $data['repeat'] ?? false,
        ]);
    }

    public function update($data)
    {
        Income::find($data['update'])->update([
            'bank_id' => $data['bank_id'],
            'status_id' => $data['status_id'],
            'payment_id' => $data['payment_id'],
            'company' => $data['company'],
            'notes' => $data['notes'],
            'amount' => $data['amount'],
            'due_date' => $data['due_date'],
            'repeat' => $data['repeat']
        ]);
    }

    public function destroy($id)
    {
        Income::find($id)->delete();
    }
}
