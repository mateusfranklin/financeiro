  <!-- Modal -->
  <div class="modal fade" id="modalFinancial" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Novo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/dashboard/new-financial" method="post">
          @csrf
          <input type="hidden" id="update" name="update" value="0">
          <div class="modal-body">
            <div class="row">
              <div class="col input-group">
                <label for="category" class="form-label">Categoria:</label>
                <div class="input-group" id="input-group-category">
                  <input type="text" class="form-control" id="new_category_name" name="new_category_name"
                    style="display: none">
                  <select name="category" id="category" class="form-select">
                    @forelse ($categories as $category)
                      <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @empty
                      <option value="">Nenhuma categoria cadastrada</option>
                    @endforelse
                  </select>
                  <button class="btn btn-primary input-group-text" name="btn_new_category"
                    id="btn_new_category">Nova</button>
                  <input type="hidden" name="new_category" id="new_category" value=0>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <label for="company" class="form-label">Empresa:</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="company" name="company">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label for="amount" class="form-label">Valor:</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="amount" name="amount" step=".01">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-sm-6 input-group">
                <label for="due_date" class="form-label">Vencimento:</label>
                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ date('Y-m-d') }}">
              </div>
              <div class="col-12 col-sm-6 input-group">
                <label for="installment" class="form-label">Parcelado</label>
                <select name="installment" id="installment" class="form-select">
                  <option value="0">Não</option>
                  <option value="1">Sim</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-sm-6 input-group">
                <label for="paid" class="form-label">Pago</label>
                <select name="paid" id="paid" class="form-select">
                  <option value="0">Não</option>
                  <option value="1">Sim</option>
                </select>
              </div>
              <div class="col-12 col-sm-6 input-group">
                <label for="payment_date" class="form-label">Data de Pagamento:</label>
                <input type="date" class="form-control" id="payment_date" name="payment_date"
                  value="{{ date('Y-m-d') }}">
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label for="notes" class="form-label">Observação:</label>
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

  @vite(['resources/js/components/modal/create-financial.js'])
