<?php

use PHPUnit\Framework\TestCase;

use App\Floor;
use App\HardFloor;
use App\CarpetFloor;
use App\Traits\HasBatteryChargeTrait;

class ApartmentTest extends TestCase
{
    use HasBatteryChargeTrait;

    /**
     * test isCharged
     *
     * @return void
     */
    public function testIsCharged()
    {        
        $isCharged = $this->isCharged();
        $this->assertTrue($isCharged);
    }

    /**
     * test letsChargedIt
     *
     * @return void
     */
    public function testLetsChargeIt()
    {        
        $letsChargeIt = $this->letsChargeIt();
        $this->assertTrue($letsChargeIt);
    }


    /**
     * test clean hard floor
     *
     * @return void
     */
    public function testCleanHardFloor(): void
    {
        $obj = new HardFloor();
        for ($i = 1; $i <= $obj->floorArea; ++$i) {                
            $message = $obj->floorName.' Area => '. (0.5 * $i) . ' m2';
            $response = $obj->execute($message);
            $this->assertEquals('cleaning floor :'.$message, $response);

            if ($i % 60 == 0) {
                $this->letsChargeIt();
                $letsChargeIt = $this->letsChargeIt();
                $this->assertTrue($letsChargeIt);
            }

            sleep(1);
        }
    } 
    
    /**
     * test clean carpet floor
     *
     * @return void
     */
    public function testCleanCarpetFloor(): void
    {
        $obj = new CarpetFloor();
        for ($i = 1; $i <= $obj->floorArea; ++$i) {                
            $message = $obj->floorName.' Area => '. (0.5 * $i) . ' m2';
            $response = $obj->execute($message);
            $this->assertEquals('cleaning floor :'.$message, $response);

            if ($i % 30 == 0) {
                $this->letsChargeIt();
                $letsChargeIt = $this->letsChargeIt();
                $this->assertTrue($letsChargeIt);
            }

            sleep(1);
        }
    } 
}