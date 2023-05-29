<?php
class FlightModel {
    private $id_f;
    private $depart_date;
    private $return_date;
    private $depart_time;
    private $return_time;
    private $place_from;
    private $place_to;
    private $passengers;


    public function getId_f() {
        return $this->id_f;
    }

    public function setId_f($id_f) {
        $this->id_f = $id_f;
    }

    public function getDepartDate() {
        return $this->depart_date;
    }

    public function setDepartDate($depart_date) {
        $this->depart_date = $depart_date;
    }

    public function getReturnDate() {
        return $this->return_date;
    }

    public function setReturnDate($return_date) {
        $this->return_date = $return_date;
    }

    public function getDepartTime() {
        return $this->depart_time;
    }

    public function setDepartTime($depart_time) {
        $this->depart_time = $depart_time;
    }

    public function getReturnTime() {
        return $this->return_time;
    }

    public function setReturnTime($return_time) {
        $this->return_time = $return_time;
    }

    public function getPlaceFrom() {
        return $this->place_from;
    }

    public function setPlaceFrom($place_from) {
        $this->place_from = $place_from;
    }

    public function getPlaceTo() {
        return $this->place_to;
    }

    public function setPlaceTo($place_to) {
        $this->place_to = $place_to;
    }

    public function getPassengers() {
        return $this->passengers;
    }

    public function setPassengers($passengers) {
        $this->passengers = $passengers;
    }
}
?>