$(document).ready(function () {
  $('.data-table').DataTable({
    ajax: '../Inventory-App/includes/route.php?type=get',
    columns: [
      { data: 'id' },
      { data: 'pname' },
      { data: 'quantity' },
      {
        data: 'id',
        fnCreatedCell: function (td, id) {
          $(td).html(
            '<div class="text-end"><a href="update.php?id=' +
              id +
              '" <abbr title="Edit this product"></abbr><i class="fas fa-pen-square "></i></a><a href="delete.php?id=' +
              id +
              '" class="text-danger" onClick="return confirm(\'Are you sure you want to delete this product?\');" ><i class="fas fa-trash"></i></a></div>'
          );
        },
      },
    ],
    columnDefs: [
      {
        orderable: false,
        targets: [2],
      },
    ],
  });
  $('.form').validate({
    rules: {
      pname: {
        required: true,
        maxlength: 24,
      },
      quantity: {
        required: true,
        maxlength: 3,
      },
    },
    messages: {
      pname: 'A KDRP product name is required.',
      quantity: {
        required: 'Please specify the quantity of items.',
        maxlength: jQuery.validator.format(
          'No more than {0} characters required'
        ),
      },
    },
    errorClass: 'is-invalid text-danger',
    submitHandler: function (form) {
      form.submit();
    },
  });
});
