<?php

/**
 * Get the base path
 * @param string $path
 * @return string
 */
function basePath($path = '')
{
  return __DIR__ . '/' . $path;
}

/**
 * Load a view file
 * @param string $name
 * @return void
 */
function loadView($name)
{
  $viewPath = basePath("views/{$name}.view.php");

  if (file_exists($viewPath)) {
    require $viewPath;
  } else {
    // Handle the error, e.g., log it or display a message
    echo "View file not found: {$name}";
  }
}

/**
 * Load a partial view file
 * @param string $name
 * @return void
 */
function loadPartial($name)
{
  $partialPath = basePath("views/partials/{$name}.php");

  if (file_exists($partialPath)) {
    require $partialPath;
  } else {
    // Handle the error, e.g., log it or display a message
    echo "Partial view file not found: {$name}";
  }
}

/**
 * Inspect a value(s)
 * @param mixed $value
 * @return void
 */
function inspect($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
}

/**
 * Inspect a value(s) and die
 * @param mixed $value
 * @return void
 */
function inspectAndDie($value)
{
  echo '<pre>';
  die(var_dump($value));
  echo '</pre>';
}
