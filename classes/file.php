<?php

class File {

  /**
   * Läd den Fragebogen
   * @param string $filename
   * @return \Survey
   */
  public static function load_survey($filename){
    $survey = new Survey();

    $row_array = file($filename);
    $countquestion = -1;
    foreach ($row_array as $row) {
      if (strstr($row, '?')) {
        $countquestion++;
        $question = new Question();
        $question->text = trim($row);
        $survey->questions[$countquestion] = $question;
      } else {
        $answer = new Answer();
        if(strstr($row, '*')) {
          $answer->is_right = true;
          $row = str_replace("*", "", $row);
        }
        $answer->text = trim($row);
        $survey->questions[$countquestion]->answers[] = $answer;
      }
    }

    foreach ($survey->questions as $question) {
      $no_answer = new Answer();
      $no_answer->text = 'Keine Ahnung';
      $question->answers[] = $no_answer;
    }

    return $survey;
  }

  /**
   * Erstellt den Prüfbogen
   * @param string $email
   * @param string $filename
   */
  public static function create_test($email, $filename){
    $test = new Test();
    $test->email = $email;
    $test->filename = $filename;

    $test_file = fopen('test.txt', 'w');
    fwrite($test_file, $test->to_string());
    fclose($test_file);
  }

  /**
   * Läd den Prüfbogen
   * @return \Test
   */
  public static function load_test(){
    $test = new Test();

    $row_array = file('test.txt');
    $test->filename = trim($row_array[0]);
    $test->email = trim($row_array[1]);
    for ($i = 2; $i < count($row_array); $i++) {
      $test->answers[] = trim($row_array[$i]);
    }

    return $test;
  }

  public static function save_test($test){
    $test_file = fopen('test.txt', 'w');
    fwrite($test_file, $test->to_string());
    fclose($test_file);
  }
}
