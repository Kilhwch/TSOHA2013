<?php

class Kayttaja {
  
  private $username;
  private $password;
  
  public function __construct($username,$password){
    $this->username = $username;
    $this->password = $password;
  }
  
  public function isValid() {
    include "connection.php";
    $sql = "SELECT username, password FROM login WHERE username=? AND password=?";
    $kysely = getTietokanta()->prepare($sql); 
    $kysely->execute(array($this->username,$this->password));
    return $kysely->rowCount()==1;
  }
  
  public function getUsername() {
    return $this->username;
  }
  
  public function getPassword() {
    return $this->password;
  }
  
  
  public function addUser() {
    include "connection.php";
    $sql = "INSERT INTO login (username, password) VALUES ($this->username, $this->password)";
    $kysely = getTietokanta()->prepare($sql);
    $kysely->execute(array($this->username, $this->password));
  }
}
  
?>
