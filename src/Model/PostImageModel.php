<?php

namespace App\Model;

class PostImageModel
{
  public int $id;
  public int $post_id;
  public string $image_url;
  public string $created_at;
}