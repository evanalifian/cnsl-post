document.addEventListener("DOMContentLoaded", function () {
  const elError = document.getElementById("toastError");
  const toastError = bootstrap.Toast.getOrCreateInstance(elError);

  toastError.show();
});
