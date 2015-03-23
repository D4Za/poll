<?php

class CmdLn {

  public static function parse(){
    $args = array();
    switch ($_SERVER['argv'][1]) {
      case 'start':
        $args['survey'] = $_SERVER['argv'][2];
        $args['email'] = $_SERVER['argv'][3];
        break;

      case 'answer':
        $args['answer'] = $_SERVER['argv'][2];
        break;

      case 'evaluate':
        break;

      default:
        break;
    }

    return $args;
  }

}