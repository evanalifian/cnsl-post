document.addEventListener("DOMContentLoaded", function () {
  const elSuccess = document.getElementById("toastSuccess");
  const toastSuccess = bootstrap.Toast.getOrCreateInstance(elSuccess);

  toastSuccess.show();
});
