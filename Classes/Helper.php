<?php
/**
 * Preparing querry for everything required.
 * 
 * @method fetchAllValues().
 *   Prepraring a querry for getting all values from database.
 * @method fetchTwoWheeler().
 *   Prepraring a querry for all count of two wheeler.
 * @method fetchFourWheeler().
 *   Prepraring a querry for all count of four wheeler.
 * @method releaseVehicle().
 *   Prepraring a querry for setting value of exit time.
 * 
 * @author Deepak Pandey <deepak.pandey@innoraft.com>
 */
class Helper {

    /**
     * Prepraring a querry for getting all values from database..
     * 
     * @return string
     *   Querry for getting all values from database.
     */
    function fetchAllValues() {
        return "SELECT * FROM parking";
    }

    /**
     * Prepraring a querry for all count of two wheeler.
     * 
     * @return string
     *   Querry for all count of two wheeler.
     */
    function fetchTwoWheeler() {
        return "SELECT * FROM parking WHERE vehicleType='2-wheeler' AND Status='Booked'";
    }

    /**
     * Prepraring a querry for all count of four wheeler.
     * 
     * @return string
     *   Querry for all count of four wheeler.
     */
    function fetchFourWheeler() {
        return "SELECT * FROM parking WHERE vehicleType='4-wheeler' AND Status='Booked'";
    }

    /**
     * Prepraring a querry for setting value of exit time.
     * 
     * @param string $vehicleNumber
     *   Stores number of vehicle.
     * @param string $vehicleType
     *   Stores types of vehicle.
     * 
     * @return string
     *   Querry for setting value of exit time.
     */
    function releaseVehicle(string $vehicleNumber, string $vehicleType) {
        return "UPDATE parking SET Status='Released',TimeOfExit=CURRENT_TIME WHERE vehicleType='$vehicleType' AND VehicleNumber='$vehicleNumber'";
    }
}

?>