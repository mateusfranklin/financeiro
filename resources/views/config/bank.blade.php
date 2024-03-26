@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      {{-- Button new bank --}}
      <div class="col-12 col-md-8 text-end">
        <button type="button" class="btn btn-primary my-2" id="btn-new-bank" data-bs-toggle="modal"
          data-bs-target="#modalNewBank">
          Novo Banco
        </button>
      </div>

      {{-- Show all banks on a list --}}
      <div class="col-12 col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Bancos') }}</div>
          <div class="card-body pb-0">
            <table class="table table-striped">

              @forelse ($banks as $bank)
                <input type="hidden" name="{{ $bank['id'] }}" id="bank-{{ $bank['id'] }}"
                  value="{{ json_encode($bank) }}">
                <tr class="row">
                  {{-- Status and Icon --}}
                  <td class="col-1">
                    <div class="rounded-circle"
                      style="background-color: @if ($bank['status_id'] == 1) green @else red @endif; width: 20px; height: 20px;">
                    </div>
                  </td>
                  <td class="col-1">
                    <i class="{{ $bank['icon'] }}"></i>
                  </td>
                  {{-- Name --}}
                  <td class="col-5 col-md-3">
                    {{ $bank['name'] }}
                  </td>
                  {{-- Saldo Inicial --}}
                  <td class="col-2">
                    R$ {{ number_format((float) str_replace(',', '', $bank['balance']), 2, ',', '.') }}
                  </td>
                  {{-- Tipo de Conta --}}
                  <td class="col-3 col-md-2">
                    {{ $accountTypes[$bank['account_type_id']] }}
                  </td>
                  {{-- Buttons --}}
                  <td class="col-12 col-md-3 w-md-auto text-center text-md-end">
                    <button type="button" class="btn btn-sm btn-primary mx-1 col-5 edit_button" name="btn-edit"
                      data-id="{{ $bank['id'] }}" data-bs-toggle="modal" data-bs-target="#modalNewBank">Editar</button>
                    <button type="button" class="btn btn-sm btn-danger mx-1 col-5 destroy_button" name="btn-destroy"
                      data-id="{{ $bank['id'] }}" data-bs-toggle="modal" data-bs-target="#modalConfirm">Excluir</button>
                  </td>
                </tr>

              @empty
                <li class="list-group
                    list-group-item-primary
                    ">
                  Nenhum banco cadastrado
                </li>
              @endforelse

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@vite(['resources/js/bank.js'])
@include('components.modal.confirm')
@include('components.modal.new-bank')
