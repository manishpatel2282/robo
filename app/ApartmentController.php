<?php

namespace App;

use App\Floor;
use App\HardFloor;
use App\CarpetFloor;
use App\Traits\HasBatteryChargeTrait;

class ApartmentController 
{
    use HasBatteryChargeTrait;

    protected $floor;
    protected $floorName;
    protected $floorArea;
    
    public function __construct(Floor $floor) 
    {
        $this->floor = $floor;
    }
    
    /**
     * Clean Apartment
     *   
     * @param $objFloor Object
     * @return void
     */
    public function clean($objFloor) 
    {   
        if(!$this->isCharged()) {   
            $this->letsChargeIt();
        }
        $this->floorName = $objFloor->floorName;
        $this->floorArea = $objFloor->floorArea;

        if ($this->floor instanceof CarpetFloor) {            
            for ($i = 1; $i <= $this->floorArea; ++$i) {                
                $message = $this->floorName.' Area => '. (0.5 * $i) . ' m2';
                $response = $this->floor->execute($message);
                echo $response . "\n";

                if ($i % 30 == 0) {
                    $this->letsChargeIt();
                    echo "\n Full Charged....\n";
                }

                sleep(1);
            }
            
        }

        if ($this->floor instanceof HardFloor) {            
            for ($i = 1; $i <= $this->floorArea; ++$i) {                
                $message = $this->floorName.' Area => '. $i . ' m2';
                $response = $this->floor->execute($message);
                echo $response . "\n";

                if ($i % 60 == 0) {
                    $this->letsChargeIt();
                    echo "\n Full Charged....\n";
                }

                sleep(1);
            }
            
        }
        
    }
}
