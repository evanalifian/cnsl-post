document.querySelectorAll(".post-body").forEach((post) => {
  post.addEventListener("click", function (e) {
    // Jika yang diklik adalah link, jangan redirect
    if (e.target.closest("a")) {
      return;
    }

    window.location.href = this.dataset.url;
  });
});
