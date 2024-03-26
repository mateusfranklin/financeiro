@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      {{-- Button new category --}}
      <div class="col-12 col-md-8 text-end">
        <button type="button" class="btn btn-primary my-2" id="btn-new-category" data-bs-toggle="modal" data-bs-target="#modalNewCategory">
          Nova Categoria
        </button>
      </div>

      {{-- Show all categories on a list --}}
      <div class="col-12 col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Categorias') }}</div>
          <div class="card-body pb-0">
            <table class="table table-striped">

              @forelse ($categories as $category)
              <input type="hidden" name="{{ $category['id'] }}" id="category-{{ $category['id'] }}" value="{{ json_encode($category) }}">
                <tr class="row">
                  {{-- Color --}}
                  <td class="col-2 col-md-1">
                    <div class="rounded-circle"
                      style="background-color: {{ $category['color'] }}; width: 20px; height: 20px;"></div>
                  </td>
                  {{-- Icon --}}
                  <td class="col-2 col-md-1">
                    <i class="{{ $category['icon'] }}"></i>
                  </td>
                  {{-- Name --}}
                  <td class="col col-md-7">
                    {{ $category['name'] }}
                  </td>
                  <td class="col-12 col-md-3 w-md-auto text-center text-md-end">
                    <button type="button" class="btn btn-sm btn-primary mx-1 col-5 edit_button" name="btn-edit"
                      data-id="{{ $category['id'] }}" data-bs-toggle="modal" data-bs-target="#modalNewCategory">Editar</button>
                    <button type="button" class="btn btn-sm btn-danger mx-1 col-5 destroy_button" name="btn-destroy"
                      data-id="{{ $category['id'] }}" data-bs-toggle="modal" data-bs-target="#modalConfirm">Excluir</button>
                  </td>
                </tr>

              @empty
                <li class="list-group
                    list-group-item-primary
                    ">
                  Nenhuma categoria cadastrada
                </li>

              @endforelse

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@vite(['resources/js/category.js', 'resources/js/components/modal/new-category.js'])
@include('components.modal.new-category')
@include('components.modal.confirm')
