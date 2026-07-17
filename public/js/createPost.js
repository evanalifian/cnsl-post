const imageFileInput = document.getElementById("imageFileInput");
const btnUploadTrigger = document.getElementById("btnUploadTrigger");
const previewContainer = document.getElementById("previewContainer");
const imagePreview = document.getElementById("imagePreview");
const btnRemovePreview = document.getElementById("btnRemovePreview");
const btnSubmitPost = document.getElementById("btn-submit-post");

btnUploadTrigger.addEventListener("click", () => {
  imageFileInput.click();
});

imageFileInput.addEventListener("change", function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      imagePreview.setAttribute("src", this.result);
      previewContainer.classList.remove("d-none");
      btnUploadTrigger.classList.add("d-none");
    });
    reader.readAsDataURL(file);
  }
});

btnRemovePreview.addEventListener("click", () => {
  imageFileInput.value = "";
  imagePreview.setAttribute("src", "#");
  previewContainer.classList.add("d-none");
  btnUploadTrigger.classList.remove("d-none");
});
