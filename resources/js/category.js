document.getElementById('btn-new-category').addEventListener('click', function (e) {
    e.preventDefault();

    const modal = document.getElementById('modalNewCategory');

    // Category ID
    modal.querySelector('#update').value = '0';
    // Name
    modal.querySelector('#name').value = '';
    // Color
    modal.querySelector('#color').value = '';
    // Icon
    modal.querySelector('#icon').value = '';
    // SubCategory Of
    modal.querySelector('#sub_category_of').value = '';
});



document.getElementsByName('btn-edit').forEach(function (element) {
    element.addEventListener('click', function (e) {
        e.preventDefault();

        const category = JSON.parse(document.getElementById('category-' + this.getAttribute('data-id')).value);
        const modal = document.getElementById('modalNewCategory');

        // Category ID
        modal.querySelector('#update').value = category.id;
        // Name
        modal.querySelector('#name').value = category.name;
        // Color
        modal.querySelector('#color').value = category.color;
        // Icon
        modal.querySelector('#icon').value = category.icon;
        // SubCategory Of
        modal.querySelector('#sub_category_of').value = category.sub_category_of ? category.sub_category_of : '';
    });
});

document.getElementsByName('btn-destroy').forEach(function (element) {
    element.addEventListener('click', function (e) {
        e.preventDefault();

        const category = JSON.parse(document.getElementById('category-' + this.getAttribute('data-id')).value);
        const modal = document.getElementById('modalConfirm');

        const form = modal.querySelector('#formConfirm');
        form.action = '/category/' + category.id;

        modal.querySelector('#_method').value = 'delete';
        modal.querySelector('#confirmButton').classList.remove('btn-primary');
        modal.querySelector('#confirmButton').classList.add('btn-danger');
        modal.querySelector('#confirmButton').innerHTML = 'Excluir';
    });
});
