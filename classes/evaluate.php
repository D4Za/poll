<?php

class Evaluate
{
  /**
   * Erstellen der Auswertung
   * @param Test $test
   * @param Survey $survey
   * @return string
   */
  public static function evaluate_test($test, $survey){

	if(count($survey->questions) != count($test->answers)){
		$result = "$test->email | $test->filename | Es wurden nicht alle Fragen beantwortet";
	
		return $result;
	}
  
    $correct_answers = 0;
    foreach($survey->questions as $question){
      foreach($question->answers as $answer) {
        if(in_array($answer->number, $test->answers) && $answer->is_right){
          $correct_answers++;
        }
      }
    }
    $total = count($survey->questions);

    $result = "$test->email | $test->filename | $correct_answers/$total";
	
    return $result;
  }
}
