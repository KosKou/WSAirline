<?php
    class DestinationBean{   
        public $id;
        public $destination;
        public $date;
        public $price;
        public $tipo;
        public $airline;
        
        function getId() {
            return $this->id;
        }

        function getDestination() {
            return $this->destination;
        }

        function getDate() {
            return $this->date;
        }

        function getPrice() {
            return $this->price;
        }

        function getTipo() {
            return $this->tipo;
        }

        function getAirline() {
            return $this->airline;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setDestination($destination) {
            $this->destination = $destination;
        }

        function setDate($date) {
            $this->date = $date;
        }

        function setPrice($price) {
            $this->price = $price;
        }

        function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        function setAirline($airline) {
            $this->airline = $airline;
        }


        }    
?>



