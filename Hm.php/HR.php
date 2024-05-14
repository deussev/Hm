<?php

// Parent class: HotelRoom
class HotelRoom {
    protected $roomNumber;
    protected $price;

    // Constructor
    public function __construct($roomNumber, $price) {
        $this->roomNumber = $roomNumber;
        $this->price = $price;
    }

    // Method to describe the room
    public function describe() {
        return "Room Number: {$this->roomNumber}, Price: {$this->price} USD per night";
    }
}

?>
