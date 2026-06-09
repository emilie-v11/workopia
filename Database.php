<?php

class Database
{
  public ?PDO $connection;

  /**
   * Undocumented function
   *
   * @param array $config
   */
  public function __construct($config)
  {
    $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};";

    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      $this->connection = new PDO($dsn, $config['username'], $config['password'], $options);

    } catch (PDOException $e) {
      throw new Exception("Database connection failed: " . $e->getMessage());
    }
  }
}
