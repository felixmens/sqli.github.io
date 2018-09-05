<?php
class SingletonClass{
    
  private static $instance = null;
  
  // The constructor is private
  // to prevent initiation with outer code.
  private function __construct()
  {
    // 
  }
 

  public static function SingletonInstance()
  {
    if (self::$instance == null)
    {
      self::$instance = new SingletonClass();
    }
 
    return self::$instance;
  }
  public function reverseStr($str){
    $this->str = $str;
    echo strrev($str);
  }
}
$Ins = SingletonClass::SingletonInstance();
$Ins->reverseStr('test');
?>