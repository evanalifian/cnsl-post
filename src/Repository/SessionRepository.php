<?php

namespace App\Repository;

use App\Model\SessionModel;

class SessionRepository
{
  private \PDO $connDB;

  public function __construct(\PDO $connDB)
  {
    $this->connDB = $connDB;
  }

  public function save(SessionModel $model): \PDOStatement
  {
    $statement = $this->connDB->prepare("INSERT INTO sessions (session_id, user_id, expired_at) VALUES (?, ?, ?)");
    $statement->execute([$model->session_id, $model->user_id, $model->expired_at]);
    return $statement;
  }

  public function getById(string $id): ?SessionModel
  {
    $statement = $this->connDB->prepare("SELECT session_id, user_id from sessions WHERE session_id = ?");
    $statement->execute([$id]);

    try {
      if ($row = $statement->fetch()) {
        $session = new SessionModel();
        $session->session_id = $row['session_id'];
        $session->user_id = $row['user_id'];
        return $session;
      } else {
        return null;
      }
    } finally {
      $statement->closeCursor();
    }
  }

  public function deleteById(string $id): void
  {
    $statement = $this->connDB->prepare("DELETE FROM sessions WHERE session_id = ?");
    $statement->execute([$id]);
  }

  public function deleteAll(): void
  {
    $this->connDB->exec("DELETE FROM sessions");
  }

  public function deleteExpired(): void
  {
    $this->connDB->exec("DELETE FROM sessions WHERE expired_at <= NOW()");
  }
}