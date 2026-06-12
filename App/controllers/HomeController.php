<?php

namespace App\Controllers;

use Framework\Database;

/**
 * HomeController is responsible for handling the home page of the application. It fetches a limited number of job listings from the database and passes them to the home view for display.
 * 
 * Methods:
 * - index(): Fetches a limited number of listings from the database and loads the home view.
 * 
 */
class HomeController
{
  protected Database $db;

  /**
   * Constructor initializes the database connection using the configuration from config/db.php
   */
  public function __construct()
  {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

  /**
   * Show the home page with a limited number of listings
   *
   * @return void
   */
  public function index()
  {
    $listings = $this->db->query("SELECT * FROM listings LIMIT 4")->fetchAll();

    loadView('home', ['listings' => $listings]);
  }
}
