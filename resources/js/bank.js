document.getElementById('btn-new-bank').addEventListener('click', function (e) {
    e.preventDefault();

    const modal = document.getElementById('modalNewBank');

    // Bank ID
    modal.querySelector('#update').value = 0;
    // Name
    modal.querySelector('#name').value = '';
    // Icon
    modal.querySelector('#icon').value = '';
    // Balance
    modal.querySelector('#balance').value = '';
    // Account Type
    modal.querySelector('#account_type_id').value = 1;
    // Status
    modal.querySelector('#status_id').value = 1;
});



document.getElementsByName('btn-edit').forEach(function (element) {
    element.addEventListener('click', function (e) {
        e.preventDefault();

        const newItem = JSON.parse(document.getElementById('bank-' + this.getAttribute('data-id')).value);
        const modal = document.getElementById('modalNewBank');

        // Bank ID
        modal.querySelector('#update').value = newItem.id;
        // Name
        modal.querySelector('#name').value = newItem.name;
        // Icon
        modal.querySelector('#icon').value = newItem.icon;
        // Balance
        modal.querySelector('#balance').value = newItem.balance;
        // Account Type
        modal.querySelector('#account_type_id').value = newItem.account_type_id ? newItem.account_type_id : '';
        // Status
        modal.querySelector('#status_id').value = newItem.status_id ? newItem.status_id : '';
    });
});

document.getElementsByName('btn-destroy').forEach(function (element) {
    element.addEventListener('click', function (e) {
        e.preventDefault();

        const newItem = JSON.parse(document.getElementById('bank-' + this.getAttribute('data-id')).value);
        const modal = document.getElementById('modalConfirm');

        const form = modal.querySelector('#formConfirm');
        form.action = '/bank/' + newItem.id;

        modal.querySelector('#_method').value = 'delete';
        modal.querySelector('#confirmButton').classList.remove('btn-primary');
        modal.querySelector('#confirmButton').classList.add('btn-danger');
        modal.querySelector('#confirmButton').innerHTML = 'Excluir';
    });
});
