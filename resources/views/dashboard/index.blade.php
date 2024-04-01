@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row my-2">

      <div class="col-6">
        <div class="form-floating col-3">
          <select class="form-select" name="month" id="month">
            @foreach ($months as $month_id => $month_name)
              <option value="{{ $month_id }}" @if ($month_id == $selected_month) selected @endif>
                {{ $month_name }}</option>
            @endforeach
          </select>
          <label for="month">Mês</label>
        </div>
      </div>

      <div class="col-6 text-end">
        <button type="button" class="btn btn-danger" id="btn_new_expense" data-bs-toggle="modal"
          data-bs-target="#modalNewExpense">
          - {{ __('Despesa') }}
        </button>
        <button type="button" class="btn btn-success" id="btn_new_income" data-bs-toggle="modal"
          data-bs-target="#modalNewIncome">
          + {{ __('Receita') }}
        </button>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        {{-- Receitas --}}
        <div class="card">
          <div class="card-header">{{ __('Receitas') }}</div>
          <div class="card-body">
            @if ($incomes->isEmpty())
              <li class="list-group list-group-item-primary">
                Nenhuma receita cadastrada
              </li>
            @else
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-3">Título</th>
                    <th class="col-5 d-none d-md-table-cell">Notas</th>
                    <th class="col-2">Recebimento</th>
                    <th class="col-2">Valor</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($incomes as $income)
                    <tr>
                      <td scope="row">{{ $income->company }}</td>
                      <td class="d-none d-md-table-cell">{{ $income->payment_id }}@if (!empty($income->payment_id) && !empty($income->notes))
                          -
                        @endif{{ $income->notes }}</td>
                      <td>{{ date('d/m/Y', strtotime($income->due_date)) }}</td>
                      <td>R$ {{ number_format((float) str_replace(',', '', $income->amount), 2, ',', '.') }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>

        {{-- Despesas --}}
        <div class="card mt-3">
          <div class="card-header">{{ __('Despesas') }}</div>
          <div class="card-body">
            @if ($allExpenses->isEmpty())
              <li class="list-group list-group-item-primary">
                Nenhuma despesa cadastrada
              </li>
            @else
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-3">Título</th>
                    <th class="col-5 d-none d-md-table-cell">Notas</th>
                    <th class="col-2">Vencimento</th>
                    <th class="col-2">Valor</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allExpenses as $expense)
                    <tr>
                      <td scope="row">{{ $expense->description }}</td>
                      <td class="d-none d-md-table-cell">{{ $expense->payment_id }}@if (!empty($expense->payment_id) && !empty($expense->notes))
                          -
                        @endif{{ $expense->notes }}</td>
                      <td>{{ date('d/m/Y', strtotime($expense->due_date)) }}</td>
                      <td>R$ {{ number_format((float) str_replace(',', '', $expense->amount), 2, ',', '.') }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>

        @if ($allExpenses->sum('amount') > 0 || $incomes->sum('amount') > 0)
          {{-- Totais --}}
          <div class="card mt-3">
            <div class="card-header">{{ __('Totais') }}</div>
            <div class="card-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col"></th>
                    <th class="col-6 col-md-2"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-success">
                    <td>Receiras</td>
                    <td>R$ {{ number_format((float) str_replace(',', '', $total['incomes']), 2, ',', '.') }}</td>
                  </tr>
                  <tr class="table-danger">
                    <td>Despesas</td>
                    <td>R$ {{ number_format((float) str_replace(',', '', $total['expenses']), 2, ',', '.') }}</td>
                  </tr>
                  <tr class="table-warning">
                    <td>Total</td>
                    <td>R$ {{ number_format((float) str_replace(',', '', $total['balance']), 2, ',', '.') }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
@vite(['resources/js/dashboard.js'])
{{-- {{ Html::script('js/dashboard.js') }} --}}
@include('components.modal.confirm')
@include('components.modal.new-expense')
@include('components.modal.new-income')
