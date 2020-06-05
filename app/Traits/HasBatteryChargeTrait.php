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
    public function letsChargeIt()
    {        
        return true;
    }
}
