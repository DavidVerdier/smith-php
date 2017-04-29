<?php
class SessionStorage
{
  public function __construct($cookieName = 'PHP_SESSION_ID')
  {
    session_name($cookieName);
    session_start();
  }

  public function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public function get($key)
  {
    if (isset($_SESSION[$key]))
      return $_SESSION[$key];
    return null;
  }
}
?>