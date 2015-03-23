<?php

switch ($argv[1]) {
  case 'start':
    include 'start.php';
    break;

  case 'answer':
    echo 'answer';
    break;

  case 'evaluate':
    echo 'evaluate';
    break;

  default:
    break;
}