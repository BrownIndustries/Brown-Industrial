<?php

namespace AppServer;

class TwigCMS extends \Twig_Extension
{
  public function getFunctions()
  {
    return array(
      new \Twig_SimpleFunction('type', function($variable){
        return gettype($variable);
      }),
      new \Twig_SimpleFunction('isArray', function($variable){
        return is_array($variable);
      })
    );
  }

  public function getFilters(){
    return array(
      new \Twig_SimpleFilter('toTitle', function($string){
        return preg_replace_callback('/(?<!\b)[A-Z][a-z]+|(?<=[a-z])[A-Z]/', function($match) {
          return ' '. $match[0];
        }, $string);
      })
    );
  }

  public function getName(){
    return "TwigCMS";
  }
}
