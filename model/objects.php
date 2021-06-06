<?php
class member {
    //User info
    private $firstName; //string
    private $lastName; //string

    //PC build specifics
    private $budget; //double
    private $cpuBrand; //string - more easy to identify 'AMD' over the number '0' in code
    private $interests; //boolean[] - order and names in data_layer.php

    //contact
    private $email; //string
    private $phone; //string
    private $state; //string
    private $city; //string
    private $address; //string
    private $postal; //string - because some postal codes in the world may use symbols or letters

    public function __construct($firstName, $lastName, $budget, $cpuBrand, $interests, $email, $phone, $state, $city,
                                $address, $postal)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->budget = $budget;
        $this->cpuBrand = $cpuBrand;
        $this->interests = $interests;
        $this->email = $email;
        $this->phone = $phone;
        $this->state = $state;
        $this->city = $city;
        $this->address = $address;
        $this->postal = $postal;
    }

    public function getFirstName() {
        return $this->firstName;
    }
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->firstName;
    }
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getBudget() {
        return $this->budget;
    }
    public function setBudget($budget) {
        $this->budget = $budget;
    }
}

//this is a monthly subscription
class prosPlus extends member {
    //active service addons
    private $servAddons; //boolean[] - extended warranty, technical support, discounted accessories

    public function __construct($servAddons)
    {

    }
}