<?php
    class DetailBean{
        public $idCliente;
        public $idDestino;
        
        function getIdCliente() {
            return $this->idCliente;
        }

        function getIdDestino() {
            return $this->idDestino;
        }

        function setIdCliente($idCliente) {
            $this->idCliente = $idCliente;
        }

        function setIdDestino($idDestino) {
            $this->idDestino = $idDestino;
        }


    }
?>

