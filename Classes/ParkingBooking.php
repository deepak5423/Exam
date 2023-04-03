<?php
/**
 * Preparing querry for vehicle Type, vehicle number and time of entry.
 * 
 * @method setValues().
 *   Prepraring a querry for entering data of vehicle in database.
 * 
 * @property string $vehicleNumber
 *   Stores number of vehicle.
 * @property string $vehicleType
 *   Stores types of vehicle.
 * 
 * @author Deepak Pandey <deepak.pandey@innoraft.com>
 */
class ParkingBooking
{
    /**
     * Stores number of vehicle.
     * @var $vehicleNumber
     */
    Private $vehicleNumber;

    /**
     * Stores types of vehicle.
     * @var $vehicleType
     */
    Private $vehicleType;

    /**
     * Initilizing the vehicleNumber and vehicleType.
     * 
     * @param string $vehicleNumber
     *   Stores number of vehicle.
     * @param string $vehicleType
     *   Stores types of vehicle.
     */
    public function __construct(string $vehicleNumber, string $vehicleType)
    {
        $this->vehicleNumber = $vehicleNumber;
        $this->vehicleType = $vehicleType;
    }

    /**
     * Prepraring a querry for entering data of vehicle in database.
     * 
     * @return string
     *   Querry for entering data of parking in table
     */
    public function setValues()
    {
        return "INSERT INTO parking (VehicleNumber, TimeOfEntry, vehicleType, Status) VALUES('$this->vehicleNumber', CURRENT_TIMESTAMP, '$this->vehicleType', 'Booked')";
    }
}