<?php
    class ClienteBean
        {   
            public $Username;
            public $Password;
            
            public $Id;
            public $Name;
            public $Address;     

            function getUsername() {
                return $this->Username;
            }
            function getPassword() {
                return $this->Password;
            }
            function getId() {
                return $this->Id;
            }
            function getName() {
                return $this->Name;
            }
            function getAddress() {
                return $this->Address;
            }
            //Setters
            function setUsername($Username) {
                $this->Username = $Username;
            }

            function setPassword($Password) {
                $this->Password = $Password;
            }
            
            function setId($Id) {
                $this->Id = $Id;
            }    

            function setName($Name) {
                $this->Name = $Name;
            }
            
            function setAddress($Address) {
                $this->Address = $Address;
            }
        
        }    
?>



