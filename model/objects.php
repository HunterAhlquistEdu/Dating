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

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param mixed $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    /**
     * @return mixed
     */
    public function getCpuBrand()
    {
        return $this->cpuBrand;
    }

    /**
     * @param mixed $cpuBrand
     */
    public function setCpuBrand($cpuBrand)
    {
        $this->cpuBrand = $cpuBrand;
    }

    /**
     * @return mixed
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * @param mixed $interests
     */
    public function setInterests($interests)
    {
        $this->interests = $interests;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getFullAddress() {
        return [
            "address" => $this->address,
            "city" => $this->city,
            "state" => $this->state,
            "postal" => $this->postal,
        ];
    }
    public function setFullAddress($address = null, $city = null, $state = null, $postal = null) {
        if ($address != null){
            $this->address = $address;
        }
        if ($city != null){
            $this->city = $city;
        }
        if ($state != null){
            $this->state = $state;
        }
        if ($postal != null){
            $this->postal = $postal;
        }
    }
}

//this is a monthly subscription
class prosPlus extends member {
    //active service addons
    private $servAddons;

    /**
     * @return mixed
     */
    public function getServAddons()
    {
        return $this->servAddons;
    }

    /**
     * @param mixed $servAddons
     */
    public function setServAddons($servAddons)
    {
        $this->servAddons = $servAddons;
    } //boolean[] - extended warranty, technical support, discounted accessories

    public function __construct($servAddons)
    {
        $this->servAddons = $servAddons;
    }
}