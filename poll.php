<?php

switch ($argv[1]) {
  case 'start':
    include "classes/cmdln.php";
    include "classes/file.php";

    $args = CmdLn::parse();
    var_dump($args);
    $survey = File::load_survey($args['survey']);
    var_dump($survey);
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