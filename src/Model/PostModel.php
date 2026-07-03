<?php

namespace App\Model;

class PostModel
{
  public int $id;
  public int $user_id;
  public string $preview_content;
  public string $content;
  public string $created_at;
}