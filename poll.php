<?php

include 'classes/cmdln.php';
include 'classes/file.php';
include 'classes/survey.php';
include 'classes/test.php';
include 'classes/output.php';
include 'classes/evaluate.php';

switch ($argv[1]) {
  case 'start':

    $args = CmdLn::parse();
    $survey = File::load_survey($args['survey']);
    $survey->number();
    File::create_test($args['email'], $args['survey']);
    Output::print_survey($survey);

    break;

  case 'answer':

    $args = CmdLn::parse();
    $test = File::load_test();
    $survey = File::load_survey($test->filename);
    $survey->number();
    $test->add_answer($args['answer'], $survey);
    $survey->mark_answer($test);
    File::save_test($test);
    Output::print_survey($survey);

    break;

  case 'evaluate':

    $test = File::load_test();
    $survey = File::load_survey($test->filename);
    $survey->number();
    $survey->mark_answer($test);
    $result = Evaluate::evaluate_test($test, $survey);
    File::save_log($result);
    Output::print_result($result);

    break;

  default:
    break;
}