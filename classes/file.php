<?php

include "survey.php";

class File {

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

    return $survey;
  }

}
