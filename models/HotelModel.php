<?php

class HotelModel {
    private $id_h;
    private $name;
    private $location;
    private $rooms;
    private $prix;
    private $img;


    public function getId_h() {
        return $this->id_h;
    }

    public function setId_h($id_h) {
        $this->id_h = $id_h;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function getRooms() {
        return $this->rooms;
    }

    public function setRooms($rooms) {
        $this->rooms = $rooms;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }
}
