<?php

class Survey {

  public $questions = array();

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
