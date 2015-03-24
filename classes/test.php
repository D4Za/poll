<?php

class Test {
  public $filename;

  public $email;

  public $answers = array();

  /**
   * Wandelt den Pr�fbogen in einen String um
   * @return type
   */
  public function to_string(){
    $string = "$this->filename\r\n";
    $string .= "$this->email\r\n";
    foreach ($this->answers as $answer) {
      $string .= "$answer\r\n";
    }
    return $string;
  }

  /**
   * Antwort in Pr�fungsbogen
   * @param string $answer
   * @param Survey $survey
   */
  public function add_answer($answer, $survey){
    $question = $survey->find_question($answer, $this);
    $this->delete_answers($question);
    $this->insert_answer($answer);
  }

  /**
   * Antwort zur Frage aus Pr�fungsbogen l�schen
   * @param Question $question
   */
  private function delete_answers($question){
    foreach ($question->answers as $answer) {
      $key = array_search($answer->number, $this->answers);
      if($key !== false){
        unset($this->answers[$key]);
      }
    }
  }

  /**
   * Antwort in Pr�fungsbogen eintragen
   * @param string $answer
   */
  private function insert_answer($answer){
    $this->answers[] = $answer;
  }
}