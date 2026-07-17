document.addEventListener("DOMContentLoaded", function () {
  const shareButtons = document.querySelectorAll(".share-post-btn");

  shareButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();

      const shareUrl = this.getAttribute("data-share-url");
      const btnElement = this;

      function showSuccessFeedback() {
        const originalHTML = btnElement.innerHTML;
        btnElement.innerHTML = `
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="20 6 9 17 4 12"></polyline>
          </svg>
          <span style="color: #10b981;">Copied!</span>
        `;

        setTimeout(() => {
          btnElement.innerHTML = originalHTML;
        }, 2000);
      }

      if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard
          .writeText(shareUrl)
          .then(() => {
            showSuccessFeedback();
          })
          .catch((err) => {
            console.error("Modern copy failed: ", err);
          });
      } else {
        const textArea = document.createElement("textarea");
        textArea.value = shareUrl;

        textArea.style.position = "fixed";
        textArea.style.top = "-999999px";
        textArea.style.left = "-999999px";
        document.body.appendChild(textArea);

        textArea.focus();
        textArea.select();

        try {
          const successful = document.execCommand("copy");
          if (successful) {
            showSuccessFeedback();
          } else {
            console.error("Fallback copy command was unsuccessful");
          }
        } catch (err) {
          console.error("Fallback copy failed: ", err);
        }

        document.body.removeChild(textArea);
      }
    });
  });
});
