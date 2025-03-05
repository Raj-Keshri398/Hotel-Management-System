<?php
class connect
{
  private $u="root";
  private $p="";
  private $d="hotel";
  private $s="localhost";
  protected $db_handle;
  public function __construct()
  {
	$this->db_handle=mysqli_connect($this->s,$this->u,$this->p,$this->d);
  }
}
?>