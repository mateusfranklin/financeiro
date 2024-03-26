// Botão de nova despesa
document.getElementById('btn_new_expense').addEventListener('click', function (e) {
    e.preventDefault();

    const modal = document.getElementById('modalNewExpense');

    const date = new Date();
    const day = (date.getDate() < 10) ? '0' + date.getDate() : date.getDate();
    const month = ((today.getMonth() + 1) < 10) ? '0' + (today.getMonth() + 1) : (today.getMonth() + 1);
    const formatDate = date.getFullYear() + '-' + month + '-' + day;

    // Update
    modal.querySelector('#update').value = '0';
    // Bank
    modal.querySelector('#bank_id').value = '';
    // Category
    modal.querySelector('#category_id').value = '';
    // Description
    modal.querySelector('#description').value = '';
    // Amount
    modal.querySelector('#amount').value = '';
    // Due Date
    modal.querySelector('#due_date').value = formatDate;
    // Repeat
    modal.querySelector('#repeat').value = '';
    // Notes
    modal.querySelector('#notes').value = '';

    console.log(formatDate)
});

// Botão de nova receita
document.getElementById('btn_new_income').addEventListener('click', function (e) {
    e.preventDefault();
    const modal = document.getElementById('modalNewIncome');

    const date = new Date();
    const day = (date.getDate() < 10) ? '0' + date.getDate() : date.getDate();
    const month = ((today.getMonth() + 1) < 10) ? '0' + (today.getMonth() + 1) : (today.getMonth() + 1);
    const formatDate = date.getFullYear() + '-' + month + '-' + day;

    // Update
    modal.querySelector('#update').value = '0';
    // Bank
    modal.querySelector('#bank_id').value = '';
    // company
    modal.querySelector('#company').value = '';
    // Amount
    modal.querySelector('#amount').value = '';
    // Due Date
    modal.querySelector('#due_date').value = formatDate;
    // Repeat
    modal.querySelector('#repeat').value = '';
    // Notes
    modal.querySelector('#notes').value = '';

    console.log(formatDate)
});

// Seleciona o mês
document.getElementById('month').addEventListener('change', function (e) {
    e.preventDefault();
    const month = e.target.value;
    // Redireciona para a rota
    window.location.href = '/dashboard/?month=' + month;
});
