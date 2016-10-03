<?php

require_once __DIR__ . '/vendor/autoload.php';

use Colors\Color;

$color = new Color();

$name = "Name.md";
$data = fopen($name, "r");

if (file_exists($name)) {
  while (($lines = fgets($data)) !== false) {
    $lines = explode(',', $lines);
    foreach ($lines as $line) {
      echo $color($line)->green();
    }
  }
  fclose($data);
}

$profile = "Profile.md";
$data = fopen($profile, "r");

$complete = 0;
$incomplete = 0;

if (file_exists($profile)) {
  while (($lines = fgets($data)) !== false) {
    $lines = explode(PHP_EOL, $lines);
    foreach ($lines as $line) {
      if (preg_match('/###/', $line)) {
        $line = substr($line, 5);
        echo $color($line)->white()->bold()->highlight('red');
      }
      elseif (preg_match('/##/', $line)) {
        $line = substr($line, 3);
        echo $color($line)->white()->bold()->highlight('blue');
      }
      elseif (preg_match('/#/', $line)) {
        $line = substr($line, 2);
      	echo $color($line)->white()->bold()->highlight('green');
      }
      elseif (preg_match('/\[\]/', $line)) {
        $line = substr($line, 3);
        $incomplete += 1;
      	echo '[' . $color('Incomplete')->red() . '] ' . $color($line)->white();
      }
      elseif (preg_match('/\[X\]/i', $line)) {
        $line = substr($line, 3);
        $complete += 1;
      	echo '[' . $color('Complete')->green() . ']' . $color($line)->white();
      }
      else {
        echo $color($line)->white();
      }
    }
    echo PHP_EOL;
  }
  fclose($data);

  $total = $complete + $incomplete;

  $complete_porcentage = (100 / $total) * $complete;
  $incomplete_porcentage = (100/ $total) * $incomplete;

  echo $color($complete_porcentage . '% Complete: ' . $complete)->white()->bold()->highlight('green');
  echo PHP_EOL;
  echo $color($incomplete_porcentage . '% Incomplete: ' . $incomplete)->white()->bold()->highlight('red');
  echo PHP_EOL;
}

?>
