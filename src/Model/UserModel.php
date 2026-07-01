<?php


namespace App\Model;

class UserModel
{
  public int $id;
  public string $username;
  public string $email;
  public string $password;
  public string $display_name;
  public string $bio;
  public string $avatar_url;
  public string $created_at;
  public string $updated_at;
}