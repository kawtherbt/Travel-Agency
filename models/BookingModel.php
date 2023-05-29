<?php

require '../database/config.php';

class BookingModel
{
    private $id_r;
    private $id_h;
    private $id_f;
    private $cin;
    private $debut_h;
    private $fin_h;
    private $debut_f;
    private $fin_f;
    private $rooms_h;
    

    public function getIdR()
    {
        return $this->id_r;
    }

    public function setIdR($id_r)
    {
        $this->id_r = $id_r;
    }

    public function getIdH()
    {
        return $this->id_h;
    }

    public function setIdH($id_h)
    {
        $this->id_h = $id_h;
    }

    public function getIdF()
    {
        return $this->id_f;
    }

    public function setIdF($id_f)
    {
        $this->id_f = $id_f;
    }

    public function getCin()
    {
        return $this->cin;
    }

    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    public function getDebutH()
    {
        return $this->debut_h;
    }

    public function setDebutH($debut_h)
    {
        $this->debut_h = $debut_h;
    }

    public function getFinH()
    {
        return $this->fin_h;
    }

    public function setFinH($fin_h)
    {
        $this->fin_h = $fin_h;
    }

    public function getDebutF()
    {
        return $this->debut_f;
    }

    public function setDebutF($debut_f)
    {
        $this->debut_f = $debut_f;
    }

    public function getFinF()
    {
        return $this->fin_f;
    }

    public function setFinF($fin_f)
    {
        $this->fin_f = $fin_f;
    }

    
    public function getRoomsH()
    {
        return $this->rooms_h;
    }

    public function setRoomsH($rooms_h)
    {
       $this->rooms_h= $rooms_h;
    }

}

?>