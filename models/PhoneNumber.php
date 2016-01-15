<?php

class PhoneNumber implements JsonSerializable {
	
    private $id;
    private $name;
    private $phoneNumber;
    
    function __construct($id) {
        return $this->id = $id;
    }
    
    public function getID() {
        return $this->id;
    }
    
    public function getPhoneNumber() {
        return $this->phoneNumber;
    }
    
    public function setPhoneNumber($phoneNumber) {
        return $this->phoneNumber = $phoneNumber;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        return $this->name = $name;
    }
	
		public function jsonSerialize() {
				return array(
						'id' => $this->id,
						'name' => $this->name,
						'phoneNumber' => $this->phoneNumber
				);
		}
}