<?php

namespace App\Http\Controllers;

use App\Constants\Status;
use App\Models\Bank;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Income;
use DateTime;
use Illuminate\Http\Request;

class DashboardController extends Controller
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

    public function index(Request $request)
    {
        $current = new DateTime();
        $selected_month = $request['month'] ?? $current->format('m');
        $selected_year = $request['year'] ?? $current->format('Y');

        $start_date = (new DateTime($selected_year . '-' . $selected_month . '-01'))->format('Y-m-d');
        $end_date = (new DateTime($selected_year . '-' . $selected_month+1 . '-0'))->format('Y-m-d');

        $total = [];

        $categories = Category::where('user_id', $this->user->id)
            ->get()
            ->keyBy('id');

        $banks = Bank::where('user_id', $this->user->id)
            ->get()
            ->keyBy('id');

        $expenses = Expense::where('user_id', $this->user->id)
            ->whereBetween('due_date', [
                $start_date,
                $end_date
            ])
            ->get();

        $incomes = Income::where('user_id', $this->user->id)
            ->whereBetween('due_date', [
                $start_date,
                $end_date
            ])
            ->get();

        $months = [
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro',
        ];

        $total = [
            'expenses' => $expenses->sum('amount') ?? 0,
            'incomes' => $incomes->sum('amount') ?? 0,
        ];
        $total['balance'] = $total['incomes'] - $total['expenses'];

        return view('dashboard.index', compact(['categories', 'banks', 'expenses', 'incomes', 'total', 'months', 'selected_month']));
    }

    // create new expense data
    public function newFinancial(Request $request)
    {
        $userId = auth()->id();

        $data = $request->validate([
            'update' => 'required',
            'category' => 'nullable',
            'new_category_name' => 'nullable',
            'new_category' => 'required',
            'company' => 'required',
            'amount' => 'required',
            'due_date' => 'required',
            'installment' => 'required',
            'paid' => 'required',
            'payment_date' => 'nullable',
            'notes' => 'nullable',
        ]);

        if ($data['new_category']) {
            $category = Category::create([
                'user_id' => $userId,
                'name' => $data['new_category_name'],
            ]);

            $data['category'] = $category->id;
        }

        if (!$data['update']) {
            Expense::create([
                'user_id' => $userId,
                'category_id' => $data['category'],
                'company' => $data['company'],
                'amount' => $data['amount'],
                'due_date' => $data['due_date'],
                'payment_date' => $data['payment_date'],
                'is_paid' => $data['paid'],
                'installment' => $data['installment'],
                'notes' => $data['notes'],
            ]);
        } else {
            $expense = Expense::find($data['update']);

            $expense->update([
                'category_id' => $data['category'],
                'company' => $data['company'],
                'amount' => $data['amount'],
                'due_date' => $data['due_date'],
                'payment_date' => $data['payment_date'],
                'is_paid' => $data['paid'],
                'installment' => $data['installment'],
                'notes' => $data['notes'],
            ]);
        }



        return redirect()->route('dashboard.index');
    }

    public function newExpense(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'bank_id' => 'required',
            'status_id' => 'nullable',
            'payment_id' => 'nullable',
            'description' => 'required',
            'amount' => 'required',
            'due_date' => 'required',
            'notes' => 'nullable',
            'repeat' => 'nullable',
        ]);

        Expense::create([
            'user_id' => $this->user->id,
            'category_id' => $data['category_id'],
            'bank_id' => $data['bank_id'],
            'status_id' => Status::Pending,
            'payment_id' => $data['payment_id'] ?? null,
            'description' => $data['description'],
            'amount' => $data['amount'],
            'due_date' => $data['due_date'],
            'notes' => $data['notes'] ?? null,
            'repeat' => $data['repeat'] ?? null,
        ]);

        return redirect()->route('dashboard.index');
    }

    public function newIncome(Request $request)
    {
        $data = $request->validate([
            'bank_id' => 'required',
            'status_id' => 'nullable',
            'payment_id' => 'nullable',
            'company' => 'required',
            'amount' => 'required',
            'due_date' => 'required',
            'notes' => 'nullable',
            'repeat' => 'nullable',
        ]);

        Income::create([
            'user_id' => $this->user->id,
            'bank_id' => $data['bank_id'],
            'status_id' => $data['status_id'] ?? Status::Paid,
            'payment_id' => $data['payment_id'] ?? null,
            'company' => $data['company'],
            'notes' => $data['notes'] ?? '',
            'amount' => $data['amount'],
            'due_date' => $data['due_date'],
            'repeat' => $data['repeat'] ?? false,
        ]);

        return redirect()->route('dashboard.index');
    }
}
