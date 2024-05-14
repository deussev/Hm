<?php
class SuiteRoom extends HotelRoom {
    private $amenities;

    // Constructor
    public function __construct($roomNumber, $price, $amenities) {
        parent::__construct($roomNumber, $price);
        $this->amenities = $amenities;
    }

    // Method to describe the suite room (overrides parent method)
    public function describe() {
        return parent::describe() . ", Amenities: " . implode(', ', $this->amenities);
    }
}
