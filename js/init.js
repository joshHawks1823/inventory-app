$(document).ready(function () {
  $('.login').validate({
    rules: {
      username: {
        required: true
      },
      password: {
        required: true
      }
    },
    messages: {
      username: 'A username is required',
      password: 'A password is required'
      },
    errorClass: 'is-invalid text-danger',
    submitHandler: function (form) {
      form.submit();
    },
  });
  $('.register').validate({
    rules: {
      fname: {
        required: true
      }, 
      lname: {
        required: true
      },
      username: {
        required: true
      },
      password: {
        required: true,
        minlength: 12
      }
    },
    messages: {
      fname: 'A first name is required',
      lname: 'A last name is required',
      username: 'A username is required',
      password: 'A password is required',
      password: {
        required: 'A password is required',
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
    order: [[0, 'asc']],
    ordering: true,
    columnDefs: [
      {
        targets: [2,3],
        orderable: false,
      },
    ],
  });
  $('.users').DataTable({
    ajax: '../Inventory-App/includes/route.php?type=getUsers',
    columns: [
      { data: 'id' },
      { data: 'active' },
      { data: 'username' },
      { data: 'fname' },
      { data: 'lname' },
      {
        data: 'id',
        fnCreatedCell: function (td, id) {
          $(td).html(
            '<div class="text-end"><a href="updateUser.php?id=' +
              id +
              '" <abbr title="Edit this product"></abbr><i class="fas fa-pen-square "></i></a><a href="deleteUser.php?id=' +
              id +
              '" class="text-danger" onClick="return confirm(\'Are you sure you want to delete this product?\');" ><i class="fas fa-trash"></i></a></div>'
          );
        },
      },
    ],
    columnDefs: [
      {
        targets: [4,5],
        orderable: false,
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
