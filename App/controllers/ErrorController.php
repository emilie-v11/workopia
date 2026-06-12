<?php

namespace App\Controllers;

/**
 * ErrorController is responsible for handling error pages of the application.
 * 
 * Methods:
 * - notFound(): Loads the 404 error view.
 * 
 */
class ErrorController
{
  /**
   * Show the 404 not found error page
   *
   * @return void
   */
  public static function notFound($message = 'Page not found')
  {
    http_response_code(404);
    loadView('error', [
      'status' => 404,
      'message' => $message
    ]);
  }

  /**
   * Show the 403 unauthorized error page
   *
   * @return void
   */
  public static function unauthorized($message = 'You are not authorized to access this page')
  {
    http_response_code(403);
    loadView('error', [
      'status' => 403,
      'message' => $message
    ]);
  }
}
