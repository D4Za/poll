<?php

class CmdLn {

  public static function parse($argv){
    $args = array();

    switch ($argv[1]) {
      case 'start':
        $args['survey'] = $argv[2];
        $args['email'] = $argv[3];
        break;

      case 'answer':
        $args['answer'] = $argv[2];
        break;

      case 'evaluate':
        break;

      default:
        break;
    }

    return $args;
  }

}