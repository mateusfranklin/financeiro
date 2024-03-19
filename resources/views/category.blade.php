@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Nova Categoria') }}</div>

          <div class="card-body">

            <form action="/category" method="post">
              @csrf
              {{-- Name --}}
              <div class="row">
                <div class="col input-group">
                  <label for="name" class="form-label">Nome:</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                </div>
              </div>

              {{-- Color --}}
              <div class="row">
                <div class="col input-group">
                  <label for="color" class="form-label">Cor:</label>
                  <div class="input-group">
                    <input type="color" class="form-control" id="color" name="color">
                  </div>
                </div>

                {{-- icon --}}
                <div class="col input-group">
                  <label for="icon" class="form-label">Ícone:</label>
                  <div class="input-group">
                    <input type="text" name="icon" id="icon" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                {{-- SubCategory of --}}
                <div class="col input-group">
                  <label for="sub_category_of" class="form-label">Categoria Pai:</label>
                  <div class="input-group">
                    <select name="sub_category_of" id="sub_category_of" class="form-select">
                      @if ($categories->isNotEmpty())
                        <option value="">Nenhuma</option>
                        @foreach ($categories as $category)
                          <option value="{{ $category['id'] }}">
                            @if ($category['sub_category_of'] > 0)
                              --
                            @endif {{ $category['name'] }}
                          </option>
                        @endforeach
                      @else
                        <option value="">Nenhuma categoria cadastrada</option>
                      @endif
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col m-2 input-group">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center mt-4">
      {{-- Show all categories on a list --}}
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Categorias') }}</div>
          <div class="card-body">
            <ul class="list-group">
              <table class="table table-striped">
                @forelse ($categories as $category)
                  <tr class="row">
                    <td class="col-9">
                      {{ $category['name'] }}
                    </td>
                    <td class="col-3 text-end">
                      <a href="/category/{{ $category['id'] }}/edit" class="btn btn-sm btn-primary mx-1">Editar</a>
                      <a href="/category/{{ $category['id'] }}/delete" class="btn btn-sm btn-danger mx-1">Excluir</a>
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
            </ul>
          </div>
        </div>
      </div>
    </div>
  @endsection
