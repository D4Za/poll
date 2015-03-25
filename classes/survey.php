<?php

class Survey {

  public $questions = array();

  /**
   * Nummeriert den Fragebogen
   */
  public function number(){
    $i = 1;
    $j = 1;
    foreach ($this->questions as $question) {
      $question->number = $i;
      foreach ($question->answers as $answer){
        $answer->number = $i.".".$j;
        $j++;
      }
      $i++;
      $j = 1;
    }
  }

  /**
   * Frage zur Antwort finden
   * @param string $given_answer
   * @param Test $test
   * @return Question
   */
  public function find_question($given_answer, $test){
    foreach ($this->questions as $key => $question){
      foreach ($question->answers as $answer) {
        if($given_answer == $answer->number){
          return $question;
        }
      }
    }
  }

  /**
   * Markiert die Antworten im Fragebogen
   * @param Test $test
   */
  // sollte nicht hier sein
  public function mark_answer($test){
    foreach ($this->questions as $key => $question){
      foreach ($question->answers as $answer) {
        if(in_array($answer->number, $test->answers)){
          $answer->marked = true;
        }
      }
    }
  }
}

class Question {

  public $answers = array();

  public $text;

  public $number;

}

class Answer {

  public $text;

  public $is_right = false;

  public $marked = false;

  public $number;

}
