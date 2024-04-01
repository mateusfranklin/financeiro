  <!-- Modal -->
  <div class="modal fade" id="modalNewCategory" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        {{-- Header --}}
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Novo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="/category" method="post">
          @csrf
          <input type="hidden" id="update" name="update" value="0">
          <div class="modal-body">

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
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
