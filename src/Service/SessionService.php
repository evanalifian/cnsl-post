<?php

namespace App\Service;

use App\Model\SessionModel;
use App\Model\UserModel;
use App\Repository\SessionRepository;
use App\Repository\UserRepository;
use App\Utils\Utils;

class SessionService
{
  public static string $COOKIE_NAME = "X-PHP-BOILERPLATE";

  private SessionRepository $sessionRepository;
  private UserRepository $userRepository;

  public function __construct(SessionRepository $sessionRepository, UserRepository $userRepository)
  {
    $this->sessionRepository = $sessionRepository;
    $this->userRepository = $userRepository;
  }

  public function save(string $userId): void
  {
    $session = new SessionModel();
    $session->session_id = bin2hex(random_bytes(32));
    $session->user_id = $userId;

    $expiredDate = time() + (60 * 60 * 24 * 30);

    $session->expired_at = date("Y-m-d H:i:s", $expiredDate);

    $this->sessionRepository->save($session);

    setcookie(self::$COOKIE_NAME, $session->session_id, $expiredDate, "/");
  }

  public function destroy()
  {
    $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
    $this->sessionRepository->deleteById($sessionId);

    setcookie(self::$COOKIE_NAME, '', 1, "/");
  }

  public function current(): ?UserModel
  {
    $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
    $session = $this->sessionRepository->getById($sessionId);

    if ($session == null) {
      return null;
    }

    $user = $this->userRepository->getUserByIdentity($session->user_id);

    $user->created_at = Utils::formatJoinTime($user->created_at);

    return $user;
  }
}