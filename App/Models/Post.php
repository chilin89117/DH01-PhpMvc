<?php
namespace App\Models;
use PDO;

class Post extends \Core\Model
{
  public static function getAll()
  {
    try
    {
      $db = static::getDB();

      $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at DESC');
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    }
    catch (PDOException $e)
    {
      echo $e->getMessage();
    }
  }
}
