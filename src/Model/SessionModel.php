<?php

namespace App\Model;

class SessionModel
{
  public string $session_id;
  public int $user_id;
  public string $expired_at;
}