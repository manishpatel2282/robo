<?php
namespace App;
use App\Floor;

class HardFloor implements Floor 
{
    public $floorName;
    public $floorArea = 70;

    public function __construct() {
        $this->floorName = 'Hard Floor';
    }

    /**
     * execute clean floor
     *   
     * @return string
     */
    public function execute($message){
        return 'cleaning floor :'.$message;
    }
}