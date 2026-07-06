<?php


namespace App\Model;

class UserModel
{
  public string $id;
  public string $username;
  public string $email;
  public string $password;
  public ?string $display_name = null;
  public ?string $bio = null;
  public ?string $avatar_url = null;
  public string $created_at;
  public string $updated_at;
}