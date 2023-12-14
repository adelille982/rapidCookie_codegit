<?php

class Address {
    private $user_id;
    private $address_line1;
    private $address_line2;
    private $city;
    private $postal_code;
    private $country;
    private $phone;

    public function __construct($user_id, $address_line1, $address_line2, $city, $postal_code, $country, $phone) {
        $this->user_id = $user_id;
        $this->address_line1 = $address_line1;
        $this->address_line2 = $address_line2;
        $this->city = $city;
        $this->postal_code = $postal_code;
        $this->country = $country;
        $this->phone = $phone;
    }

    public function saveAddress(Database $database) {
        $query = "INSERT INTO address (user_id, address_line1, address_line2, city, postal_code, country, phone) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = [$this->user_id, $this->address_line1, $this->address_line2, $this->city, $this->postal_code, $this->country, $this->phone];
        $database->executeQuery($query, $params);
    }

    public static function getUserAddresses(Database $database, $user_id) {
        $query = "SELECT * FROM address WHERE user_id = ?";
        $params = [$user_id];
        $result = $database->executeQuery($query, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
} 