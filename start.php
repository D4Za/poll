<?php

include "classes/cmdln.php";
include "classes/file.php";

$args = CmdLn::parse($argv);
$survey = File::load_survey($args['survey']);
var_dump($survey);