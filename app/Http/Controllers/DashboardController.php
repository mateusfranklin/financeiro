<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::where('user_id', auth()->id())
            ->get()
            ->keyBy('id')
            ->toArray();

        $expenses = Expense::where('user_id', auth()->id())
            ->get()
            ->groupBy('category_id')
            ->toArray();

        // sum all amount on expense where is_paid is true;
        foreach ($expenses as $cat => $expense) {
            $categories[$cat]['sum_amount'] = 0;
            foreach ($expense as $exp) {
                if ($exp['is_paid']) $categories[$cat]['sum_amount'] += $exp['amount'];
            }
        }

// dd($expenses);


        return view('dashboard.index', compact(['categories', 'expenses']));
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
}
