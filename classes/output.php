<?php

class Output {

  /**
   * Gibt den Fragebogen aus
   * @param Survey $num_survey
   */
  public static function print_survey($num_survey){
    print_r("\n");
    foreach ($num_survey->questions as $question){
      print_r($question->text . "\n");
      foreach ($question->answers as $answer) {
        $answer_string = '[';
        if($answer->marked){
          $answer_string .= 'X';
        } else {
          $answer_string .= ' ';
        }
        $answer_string .= '] ' . $answer->number . ' ' . $answer->text . "\n";
        print_r($answer_string);
      }
      print_r("\n");
    }
  }

  public static function print_result($result){
    print_r("\n");
    print_r($result);
    print_r("\n");
  }

}
