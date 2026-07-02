document.addEventListener("DOMContentLoaded", function () {
  const modalElement = document.getElementById("changePictureModal");
  const avatarInput = document.getElementById("avatar");
  const formElement = modalElement.querySelector("form");
  const submitButton = modalElement.querySelector('button[type="submit"]');

  function toggleSubmitButton() {
    if (avatarInput.files && avatarInput.files.length > 0) {
      submitButton.removeAttribute("disabled");
    } else {
      submitButton.setAttribute("disabled", "true");
    }
  }

  avatarInput.addEventListener("change", toggleSubmitButton);

  modalElement.addEventListener("hidden.bs.modal", function () {
    formElement.reset();
    submitButton.setAttribute("disabled", "true");
  });
});
