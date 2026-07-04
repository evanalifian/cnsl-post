document.addEventListener("DOMContentLoaded", function () {
  const deletePostModal = document.getElementById("deletePostModal");
  const deletePostForm = document.getElementById("deletePostForm");

  if (deletePostModal && deletePostForm) {
    // Dipicu tepat sebelum modal Bootstrap muncul ke layar
    deletePostModal.addEventListener("show.bs.modal", function (event) {
      // Tombol (dropdown item) yang memicu modal
      const button = event.relatedTarget;

      // Ambil ID postingan dari atribut data-post-id
      const postId = button.getAttribute("data-post-id");

      // Atur URL Action Form sesuai dengan pola router backend Anda
      // Contoh: /post/delete/12 atau /api/delete_post.php?id=12
      deletePostForm.setAttribute("action", `/post/${postId}/delete`);
    });
  }
});
