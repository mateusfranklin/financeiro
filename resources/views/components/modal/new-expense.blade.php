  <!-- Modal -->
  <div class="modal fade" id="modalNewExpense" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        {{-- Header --}}
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Nova Despesa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="/dashboard/new-expense" method="post">
          @csrf
          {{-- Update --}}
          <input type="hidden" id="update" name="update" value="0">
          <div class="modal-body">

            <div class="row">
              {{-- Bank --}}
              <div class="col form-group">
                <label for="bank_id">Banco</label>
                <select class="form-select" name="bank_id" id="bank_id">
                  @foreach ($banks as $bank)
                    <option value="{{ $bank->id }}" @if ($bank->id == 1) selected @endif>
                      {{ $bank->name }}</option>
                  @endforeach
                </select>
              </div>

              {{-- Category --}}
              <div class="col form-group">
                <label for="category_id">Categoria</label>
                <select class="form-select" name="category_id" id="category_id">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == 1) selected @endif>
                      {{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row">
              {{-- Description --}}
              <div class="col input-group">
                <label for="description" class="form-label">Título:</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="description" name="description" description="name"
                    placeholder="Nome">
                </div>
              </div>
            </div>

            <div class="row">
              {{-- Amount --}}
              <div class="col-4 form-group">
                <label for="amount" class="form-label">Valor:</label>
                <div class="input-group">
                  <input type="number" name="amount" id="amount" class="form-control" step="0.01"
                    placeholder="0.00">
                </div>
              </div>

              {{-- Due Date --}}
              <div class="col-4 form-group">
                <label for="due_date" class="form-label">Vencimento:</label>
                <div class="input-group">
                  <input type="date" class="form-control" id="due_date" name="due_date" value="{{ date('Y-m-d') }}">
                </div>
              </div>

              {{-- Repeat? --}}
              <div class="col-4 form-group">
                <label for="repeat" class="form-label">Repete?</label>
                <select class="form-select" name="repeat" id="repeat">
                  <option value="0" selected>NÃO</option>
                  <option value="1">SIM</option>
                </select>
              </div>
            </div>

            <div class="row">
              {{-- Notes --}}
              <div class="col form-group">
                <label for="notes" class="form-label">Notas</label>
                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
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
