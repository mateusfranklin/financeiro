  <!-- Modal -->
  <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        {{-- Header --}}
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Confirmação</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="formConfirm" action="" method="POST">
          @csrf
          <input type="hidden" name="_method" id="_method" value="POST">
          <input type="hidden" id="modal-category-id" name="modal-category-id" value="0">
          <div class="modal-body">
            <p>Tem certeza que deseja excluir o item selecionado?</p>
            <p id="modal-category-name"></p>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="confirmButton" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
