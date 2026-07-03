<script>
  const btnFollow = document.getElementById("btn-follow");

  btnFollow.addEventListener("click", async () => {
    const isFollowing = btnFollow.dataset.following === "true";

    const endpoint = isFollowing
      ? "/user/<?= $data['user']['id'] ?>/unfollow"
      : "/user/<?= $data['user']['id'] ?>/follow";

    try {
      btnFollow.disabled = true;

      const response = await fetch(endpoint, {
        method: "POST",
        credentials: "same-origin",
        headers: {
          "X-Requested-With": "XMLHttpRequest"
        }
      });

      if (!response.ok) {
        throw new Error("Request failed");
      }

      // Update status hanya jika request berhasil
      btnFollow.dataset.following = (!isFollowing).toString();
      btnFollow.textContent = isFollowing ? "Follow" : "Unfollow";

      const followerCountEl = document.getElementById("follower-count");
      if (followerCountEl) {
        const currentCount = parseInt(followerCountEl.textContent, 10) || 0;
        followerCountEl.textContent = isFollowing ? currentCount - 1 : currentCount + 1;
      }
    } catch (error) {
      console.error(error);
      alert("Failed to update follow status.");
    } finally {
      btnFollow.disabled = false;
    }
  });
</script>