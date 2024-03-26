document.getElementsByName('expense').forEach(function (element) {
    element.addEventListener('click', function (e) {
        const expense = JSON.parse(this.getAttribute('data-expense'));
        const modalFinancial = document.getElementById('modalFinancial');
        // New
        modalFinancial.querySelector('#update').value = expense.id;
        // Category
        modalFinancial.querySelector('select[name="category"]').value = expense.category_id;
        // Company
        modalFinancial.querySelector('#company').value = expense.company;
        // Amount
        modalFinancial.querySelector('#amount').value = expense.amount;
        // Due Date
        modalFinancial.querySelector('#due_date').value = expense.due_date;
        // Installment
        modalFinancial.querySelector('#installment').value = expense.installment;
        // Paid
        modalFinancial.querySelector('#paid').value = expense.is_paid ? 1 : 0;
        // Payment Date
        modalFinancial.querySelector('#payment_date').value = expense.payment_date;
        // Description
        modalFinancial.querySelector('#notes').value = expense.notes;

        console.log(expense);
    });
});

// Criação de uma nova categoria
document.getElementById('btn_new_category').addEventListener('click', function(e) {
    e.preventDefault();
    const newCategory = document.getElementById('new_category').getAttribute('value') == 0 ? 1 : 0;
    // se clicar em nova catergoria
    if (newCategory == 1) {
        document.getElementById('new_category').setAttribute('value', 1);
        document.getElementById('category').style.display = 'none';
        document.getElementById('new_category_name').style.display = 'block';
        this.innerHTML = 'Cancelar'


    } else {
        document.getElementById('new_category').setAttribute('value', 0);
        document.getElementById('category').style.display = 'block';
        document.getElementById('new_category_name').style.display = 'none';
        this.innerHTML = 'Nova'
    }
});
