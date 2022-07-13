<?php
  require_once("../../../config.php");
  require_once("../../Libraries/Elements/Elements.php");

  class Wallet {
    var $username="";
    var $password="";

    function __construct() {}

    function init(){}

    function Deposit($amount){
      $balance = $this->GetBalance();
      $updatedamount = $balane + $amount;
      $userid = $_SESSION['userid'];

      $sql = "UPDATE wallets SET amount = '$updatedamount' WHERE id = '$userid'";
      $result = runSQL($sql);

      return $result;
    }

    function GetBalance(){
      $userid = $_SESSION['userid'];

      $sql = "SELECT * FROM wallets WHERE userid = 20";// . $userid;
      $data = runSQL($sql);
      $wallet = $data-> fetch_assoc();

      return $wallet['balance'];
    }
}
