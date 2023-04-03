<?php

namespace App\Controller;

use App\Entity\Parking;
use App\Services\UserOperations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
     * @var object
     *    Request object handles parameter from query parameter.
     */
    private $em;

    /**
     * @var object
     *    Instance of Parking Repository.
     */
    private $park;

    /**
     * @var object
     *    Object of Parking Repository.
     */
    private $parking;
    

    /**
     * This constructor is used to initializing the object and also provides the
     * access to EntityManagerInterface
     * 
     * @param object $em
     *   Request object handles parameter from query parameter.
     * @param object $park
     *   Instance of Parking Repository.
     * @param object $parking
     *   Object of Parking Repository.
     * 
     * @return void
     */
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
        $this->park = $this->em->getRepository(Parking::class);
        $this->parking = new Parking();
    }

    /**
     * This routes opens the home page.
     *
     * @return Response
     *   Returns to the home page.
     */
    #[Route('/', name: 'Home')]
    public function index()
    {
        return $this->render('main/index.html.twig');
    }

     /**
     * This routes opens the generate page before submiting form and if the 
     * form is submitted then it stores values in the database.
     *
     * @param object $request
     *   Request object handles parameter from query parameter.
     *
     * @return Response
     *   Returns ticket generate page.
     */
    #[Route('/generate', name: 'generate')]
    public function generate(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $vehicleNumber = $request->request->get('vehicleNumber');
            $vehicleType = $request->request->get('vehicleType');

            $check = $this->park->findOneBy(['vehicleNumber' => $vehicleNumber, 'Status' => 'Booked', 'VehicleType' => $vehicleType]);
            // If user has already booked parking space then it show that you 
            // have already booked.
            if(!$check) {
                $this->parking->setVal($vehicleNumber, $vehicleType);
                $this->em->persist($this->parking);
                $this->em->flush();
                return new Response('Booked successfully');
            }
            return new Response('You have already booked');
        }
        return $this->render('main/generate.html.twig');
    }

    /**
     * This routes opens the release page before submiting form and if the 
     * form is submitted then it updates values in the database.
     *
     * @param object $request
     *   Request object handles parameter from query parameter.
     *
     * @return Response
     *   Returns ticket release page.
     */
    #[Route('/release', name: 'release')]
    public function release(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $vehicleNumber = $request->request->get('vehicleNumber');
            $vehicleType = $request->request->get('vehicleType');

            $check = $this->park->findOneBy(['vehicleNumber' => $vehicleNumber, 'Status' => 'Booked', 'VehicleType' => $vehicleType]);
            // If the user does not booked parking space or if the vehicle is 
            // already released then show that it will show something wrong
            // otherwise it will released the vehicle and update the database.
            if($check) {
                $check->setStatus('Released');
                $check->setTimeOfExit(new \Datetime());
                $this->em->persist($check);
                $this->em->flush();
                return new Response('Thankyou for comming');
            }
            return new Response('Sorry you have entered something wrong.');
        }
        return $this->render('main/release.html.twig');
    }

    /**
     * This routes opens the tickets page with all the details of tickets.
     *
     * @param object $request
     *   Request object handles parameter from query parameter.
     *
     * @return Response
     *   Returns ticket page with all data.
     */
    #[Route('/ticket', name: 'ticket')]
    public function ticket()
    {
        $check = $this->park->findAll();
        $user = new UserOperations;
        $parkingDetails = $user->getAllTickets($check);
        return $this->render('main/ticket.html.twig',['parkingDetails' => $parkingDetails]);
    }

    /**
     * This routes opens the available page with all the details of avaliable 
     * slots.
     *
     * @param object $request
     *   Request object handles parameter from query parameter.
     *
     * @return Response
     *   Returns available page with all the details of slots.
     */
    #[Route('/available', name: 'available')]
    public function available()
    {
        $twoWheeler = $this->park->count(['Status' => 'Booked', 'VehicleType' => '2-wheeler']);
        $fourWheeler = $this->park->count(['Status' => 'Booked', 'VehicleType' => '4-wheeler']);
        return $this->render('main/available.html.twig',['twoWheeler' => $twoWheeler, 'fourWheeler' => $fourWheeler]);
    }
    #[Route('/cron', name: 'cron')]
    public function cron()
    {
        $check = $this->park->findAll();
        $this->em->deleteAllValues();
        $this->em->flush();
    }
}