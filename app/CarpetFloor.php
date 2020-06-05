<?php
namespace App;
use App\Floor;

class CarpetFloor implements Floor 
{

    public $floorName;
    public $floorArea = 60;

    public function __construct() {
        $this->floorName = 'Carpet Floor';
    }

    /**
     * execute clean floor
     *   
     * @return string
     */
    public function execute($message) {
        return 'cleaning floor :'.$message;
    }
}