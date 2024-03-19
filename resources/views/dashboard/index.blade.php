@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">{{ __('Saídas') }}</div>
          <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

          </div>
        </div>

        <div class="card mt-3">
          <div class="card-header">{{ __('Entradas') }}</div>
          <div class="card-body">


          </div>
        </div>

        <div class="card mt-3">
          <div class="card-header">{{ __('Totais') }}</div>
          <div class="card-body">


          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
