<?php

namespace App\Entity;

use App\Repository\ParkingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParkingRepository::class)]
class Parking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $vehicleNumber = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $TimeOfEntry = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $TimeOfExit = null;

    #[ORM\Column(length: 255)]
    private ?string $Status = null;

    #[ORM\Column(length: 255)]
    private ?string $VehicleType = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicleNumber(): ?string
    {
        return $this->vehicleNumber;
    }

    public function setVehicleNumber(string $vehicleNumber): self
    {
        $this->vehicleNumber = $vehicleNumber;

        return $this;
    }

    public function getTimeOfEntry(): ?\DateTimeInterface
    {
        return $this->TimeOfEntry;
    }

    public function setTimeOfEntry(\DateTimeInterface $TimeOfEntry): self
    {
        $this->TimeOfEntry = $TimeOfEntry;

        return $this;
    }

    public function getTimeOfExit(): ?\DateTimeInterface
    {
        return $this->TimeOfExit;
    }

    public function setTimeOfExit(?\DateTimeInterface $TimeOfExit): self
    {
        $this->TimeOfExit = $TimeOfExit;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getVehicleType(): ?string
    {
        return $this->VehicleType;
    }

    public function setVehicleType(string $VehicleType): self
    {
        $this->VehicleType = $VehicleType;

        return $this;
    }

    public function setVal(string $vehicleNumber, string $vehicleType) {
        $this->setVehicleNumber($vehicleNumber);
        $this->setVehicleType($vehicleType);
        $this->setStatus('Booked');
        $this->setTimeOfEntry(new \Datetime());
    }
}
