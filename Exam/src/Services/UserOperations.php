<?php

namespace App\Services;

/**
 * This class takes the object and then process it and return 
 * in the form of associative array.
 * 
 * @method getAllTickets()
 *    Converts array of all tickets in the form of associative array.
 * 
 * @author Deepak Pandey <deepak.pandey@innoraft.com>
 */
class UserOperations {
    /**
     * Converts array of all tickets in the form of associative array.
     * 
     * @param array $parkingDetails
     *   Stores all the data about all the tickets.
     * 
     * @return array
     *   It returns array of all the tickets data.
     */
    public function getAllTickets(array $parkingDetails) 
    {
        $arr = [];

        forEach($parkingDetails as $parkingDetail) {
            if ($parkingDetail->getTimeOfExit()) {
            $arr[] = [
                'slotNumber' => $parkingDetail->getId(),
                'vehicleNumber' => $parkingDetail->getVehicleNumber(),
                'timeOfEntry' => $parkingDetail->getTimeOfEntry()->format('d/m/Y'),
                'timeOfExit' => $parkingDetail->getTimeOfExit()->format('d/m/Y'),
                'status' => $parkingDetail->getStatus(),
                'vehicleType' => $parkingDetail->getVehicleType(),
            ];
        }
            else {
                $arr[] = [
                    'slotNumber' => $parkingDetail->getId(),
                    'vehicleNumber' => $parkingDetail->getVehicleNumber(),
                    'timeOfEntry' => $parkingDetail->getTimeOfEntry()->format('d/m/Y'),
                    'timeOfExit' => '',
                    'status' => $parkingDetail->getStatus(),
                    'vehicleType' => $parkingDetail->getVehicleType(),
                ];
                $arr += [];
            }
        }
        return $arr;
    }
}
?>