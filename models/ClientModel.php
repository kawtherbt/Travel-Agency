<?php

class ClientModel {
  private $name;
  private $phone;
  private $country;
  public $cin;
  private $date_n;
  private $email;
  private $password;

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getPhone() {
    return $this->phone;
  }

  public function setPhone($phone) {
    $this->phone = $phone;
  }

  public function getCountry() {
    return $this->country;
  }

  public function setCountry($country) {
    $this->country = $country;
  }

  public function getCin() {
    return $this->cin;
  }

  public function setCin($cin) {
    $this->cin = $cin;
  }

  public function getDate_n() {
    return $this->date_n;
  }

  public function setDate_n($date_n) {
    $this->date_n = $date_n;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }
}


?>
