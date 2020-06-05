<?php
require 'vendor/autoload.php';

use App\ApartmentController;
use App\HardFloor;
use App\CarpetFloor;

class Robot 
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */    

    public function __construct($objFloor)
    {
        $controller = new ApartmentController($objFloor);
        $controller->clean($objFloor);           
    }

}
// robot.php clean --floor=hard --area=70
// robot.php clean --floor=carpet --area=60
// print_r($argv);


if ($argv[2] == '--floor=carpet')
{
    $objFloor = new CarpetFloor();
    $area = isset($argv[3]) && $argv[3] != '' ? explode("=",$argv[3]) : $objFloor->floorArea;
    $objFloor->floorArea = $area[1];
}

if ($argv[2] == '--floor=hard')
{
    $objFloor = new HardFloor();
    $area = isset($argv[3]) && $argv[3] != '' ? list($name, $area) = explode("=",$argv[3]) : $objFloor->floorArea;
    $objFloor->floorArea = $area[1];
}

$obj = new Robot($objFloor);
