<?php

namespace App\Controllers;

use Framework\Database;

/**
 * ListingController handles all listing related actions such as displaying listings, showing a single listing, and creating new listings.
 * 
 * Methods:
 * - index(): Fetches all listings from the database and loads the index view.
 * - create(): Loads the view for creating a new listing.
 * - show(): Fetches a single listing based on the provided ID and loads the show view.
 * 
 */
class ListingController
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
   * Show all listings
   *
   * @return void
   */
  public function index()
  {
    $listings = $this->db->query("SELECT * FROM listings")->fetchAll();

    loadView('listings/index', ['listings' => $listings]);
  }

  /**
   * Show the form for creating a new listing
   *
   * @return void
   */
  public function create()
  {
    loadView('listings/create');
  }

  /**
   * Show a single listing
   *
   * @return void
   */
  public function show()
  {
    $id = $_GET['id'] ?? null;

    $params = ['id' => $id];

    $listing = $this->db->query("SELECT * FROM listings WHERE id = :id", $params)->fetch();

    loadView('listings/show', [
      'listing' => $listing
    ]);
  }
}
