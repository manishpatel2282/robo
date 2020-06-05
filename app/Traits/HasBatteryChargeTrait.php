<?php

namespace App\Traits;

trait HasBatteryChargeTrait
{
    /**
     * Battery is charged or not     
     *   
     * @return boolean
     */
    public function isCharged()
    {        
        return true;
    }

    /**
     * Charged Battery
     *   
     * @return boolean
     */
    public function letsChargeIt($isTest = false)
    {   
        //For unit testing only
        if($isTest == true) {
            return true;
        }

        for ($i = 1; $i <= 30; ++$i) {            
            sleep(1);
        }
        if ($i == 30)
            return true;
    }
}
