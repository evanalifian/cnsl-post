<?php

namespace App\Model;

class PostResponseModel {
  public string $post_id;
  public string $content;
  public string $preview_content;
  public ?string $image_url = null;
  public string $created_at;
  public string $user_id;
  public string $username;
  public ?string $display_name = null;
  public ?string $avatar_url = null;
}