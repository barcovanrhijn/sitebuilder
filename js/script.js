function onSubmit(token) {
  $('form').on('submit', function (e) {

    e.preventDefault();
    $.ajax({
      type: 'post',
      url: 'form-post.php',
      data: $('form').serialize(),
      success: function () { 
        alert('form was submitted');
        location.reload();
      }
    });

  });
}

(function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())
