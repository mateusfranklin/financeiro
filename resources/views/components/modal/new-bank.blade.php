  <!-- Modal -->
  <div class="modal fade" id="modalNewBank" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        {{-- Header --}}
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Novo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="/bank" method="post">
          @csrf
          {{-- Update --}}
          <input type="hidden" id="update" name="update" value="0">
          <div class="modal-body">

            <div class="row">
              {{-- Name --}}
              <div class="col input-group">
                <label for="name" class="form-label">Nome:</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
                </div>
              </div>
            </div>

            <div class="row">
              {{-- icon --}}
              <div class="col input-group">
                <label for="icon" class="form-label">Ícone:</label>
                <div class="input-group">
                  <input type="text" name="icon" id="icon" class="form-control" placeholder="Classe do F.A.">
                </div>
              </div>

              {{-- Balance --}}
              <div class="col input-group">
                <label for="balance" class="form-label">Saldo inicial:</label>
                <div class="input-group">
                  <input type="number" name="balance" id="balance" class="form-control" step="0.01" placeholder="0.00">
                </div>
              </div>
            </div>

            <div class="row">
              {{-- Account Type ID --}}
              <div class="col form-group">
                <label for="account_type_id">Tipo de Conta</label>
                <select class="form-select" name="account_type_id" id="account_type_id">
                  @foreach ($accountTypes as $accountTypes_id => $accountType_name)
                    <option value="{{ $accountTypes_id }}" @if ($accountTypes_id == 1) selected @endif>
                      {{ $accountType_name }}</option>
                  @endforeach
                </select>
              </div>

              {{-- Status --}}
              <div class="col form-group">
                <label for="status_id">Status</label>
                <select class="form-select" name="status_id" id="status_id">
                  @foreach ($statuses as $status_id => $status_name)
                    <option value="{{ $status_id }}" @if ($status_id == 1) selected @endif>
                      {{ $status_name }}</option>
                  @endforeach
                </select>
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

  @vite(['resources/js/components/modal/new-bank.js'])
