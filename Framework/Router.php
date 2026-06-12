<?php

namespace Framework;

class Router
{
  protected $routes = [];

  /**
   * Add a new route
   *
   * @param string $method
   * @param string $uri
   * @param string $action
   * @return void
   */
  public function registerRoute(string $method, string $uri, string $action): void
  {
    list($controller, $controllerMethod) = explode('@', $action);
    $this->routes[] = [
      'method' => $method,
      'uri' => $uri,
      'controller' => $controller,
      'controllerMethod' => $controllerMethod
    ];
  }

  /**
   * Add a GET route
   * 
   * @param string $uri
   * @param string $controller
   * @return void
   */

  public function get(string $uri, string $controller): void
  {
    $this->registerRoute('GET', $uri, $controller);
  }

  /**
   * Add a POST route
   * 
   * @param string $uri
   * @param string $controller
   * @return void
   */

  public function post(string $uri, string $controller): void
  {
    $this->registerRoute('POST', $uri, $controller);
  }

  /**
   * Add a PUT route
   * 
   * @param string $uri
   * @param string $controller
   * @return void
   */

  public function put(string $uri, string $controller): void
  {
    $this->registerRoute('PUT', $uri, $controller);
  }

  /**
   * Add a DELETE route
   * 
   * @param string $uri
   * @param string $controller
   * @return void
   */

  public function delete(string $uri, string $controller): void
  {
    $this->registerRoute('DELETE', $uri, $controller);
  }

  /**
   * Load error page
   * 
   * @param int $httpCode
   * @return void
   */
  public function error(int $httpCode = 404): void
  {
    http_response_code($httpCode);
    loadView("error/{$httpCode}");
    exit;
  }

  /**
   * Route the request to the appropriate controller based on the URI and HTTP method
   * 
   * @param string $uri
   * @param string $method
   * @return void
   */
  public function route(string $uri, string $method): void
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === $method) {
        // Extract controller and method from the route
        $controller = "App\\Controllers\\{$route['controller']}";
        $controllerMethod = $route['controllerMethod'];

        // Instatiate the controller and call the method
        $controllerInstance = new $controller();
        $controllerInstance->$controllerMethod();
        return;
      }
    }

    $this->error();
  }
}
