<?php

namespace Autodoprava\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Autodoprava\AppBundle\Model\CarsRepository;
use Autodoprava\AppBundle\Model\CustomerRepository;
use Autodoprava\AppBundle\Model\OrdersRepository;
use Autodoprava\AppBundle\Model\OtherRepository;

/**
 * Třída sloužící pro vytvoření stránek pro přepravu a objednávek
 * @author Marek Rojík
 */
class PrepravaController extends Controller
{
    /**
     * Akce pro vytvoření stránky s pick-up přepravou
     */
    public function PickupAction()
    {
        $carsRepository = $this->get('carsRepository');
        $allCars = $carsRepository->fetchAllCarsByTransport(1);
        $fotoCars = $carsRepository->fetchCarsFotoByTransport(1);
        return $this->render('AutodopravaAppBundle:Preprava:Preprava.html.twig', array(
                'cars' => $allCars,
                'fotos' => $fotoCars,
                'name' => "Pick-up přeprava",
                'idTransport' => 1
            ));    
    }

    /**
     * Akce pro vytvoření stránky s dodávkovou přepravou
     */
    public function DodavkovaAction()
    {
        $carsRepository = $this->get('carsRepository');
        $allCars = $carsRepository->fetchAllCarsByTransport(2);
        $fotoCars = $carsRepository->fetchCarsFotoByTransport(2);
        return $this->render('AutodopravaAppBundle:Preprava:Preprava.html.twig', array(
                'cars' => $allCars,
                'fotos' => $fotoCars,
                'name' => "Dodávková přeprava",
                'idTransport' => 2
            ));    
    }

    /**
     * Akce pro vytvoření stránky s nákladní přepravou
     */
    public function NakladniAction()
    {
        $carsRepository = $this->get('carsRepository');
        $allCars = $carsRepository->fetchAllCarsByTransport(3);
        $fotoCars = $carsRepository->fetchCarsFotoByTransport(3);
        return $this->render('AutodopravaAppBundle:Preprava:Preprava.html.twig', array(
                'cars' => $allCars,
                'fotos' => $fotoCars,
                'name' => "Nákladní přeprava",
                'idTransport' => 3
            ));    
    }

    /**
     * Akce pro vytvoření stránky Stěhování
     */
    public function StehovaniAction()
    {
        $this->otherRepository = $this->get('otherRepository');
        $migration = $this->otherRepository->fetchTextPage(3);
        return $this->render('AutodopravaAppBundle:Main:stehovani.html.twig', array(
            'migration' => $migration,
            ));  
    }

    /**
     * Akce pro vytvoření stránky Skladování
     */
    public function SkladovaniAction()
    {
        $this->otherRepository = $this->get('otherRepository');
        $storage = $this->otherRepository->fetchTextPage(4);
        return $this->render('AutodopravaAppBundle:Main:skladovani.html.twig', array(
            'storage' => $storage,
            ));     
    }

    /**
     * Akce pro vytvoření formulářů pro vytvoření objednávky
     * @param Request $request1  request formuláře
     * @param Request $request2  request formuláře
     * @param $transport ID přepravy
     * @param $car       ID auta
     */
    public function ObjednavkaAction(Request $request1, Request $request2, $transport, $car)
    {
        $carsRepository = $this->get('carsRepository');
        $customerRepository = $this->get('customerRepository');
        $ordersRepository = $this->get('ordersRepository');

        $carName = $carsRepository->fetchCarNameById($car);
        $transportName = $carsRepository->fetchTransportById($transport);

        $formReg = $this->createFormBuilder() // formulář, kdy stačí k zadání jenom email
            ->add('email', 'email')
            ->getForm();
        $formReg->handleRequest($request2);

        if($formReg->isValid())
        {
            $formRegData = $formReg->getData();
            $customer = $customerRepository->fetchCustomerByEmail($formRegData['email']);
            if(count($customer) >= 1)
            {
                $cus = $customer[0];
                $customerId = $cus['id_zakaznika'];
                
                $order = array('datum' => new \DateTime(),
                        'zakaznici_id' => $customerId,
                        'preprava_id' => $transport,
                        'auto_id' => $car);
                $ordersRepository->addNewOrder($order);
                $request2->getSession()->getFlashBag()->set('notice', 'Objednávka byla úspěšně vytvořena, v nejbližší době vás budeme kontaktovat');
                return $this->redirect($this->generateUrl('autodoprava_app_homepage'));
            }
            else
            {
                $request2->getSession()->getFlashBag()->set('notice', 'Tento email není zaregistrován!');
                return $this->redirect($this->generateUrl('_objednavka', array('transport' => $transport, 'car' => $car)));
            }
        }

        $form = $this->createFormBuilder()  // formulář pro vytvoření objednávky nového zákazníka
            ->add('jmeno', 'text')
            ->add('prijmeni', 'text')
            ->add('email', 'email')
            ->add('ulice', 'text')
            ->add('mesto', 'text')
            ->add('psc', 'text')
            ->getForm();
        $form->handleRequest($request1);

        if ($form->isValid()) {
            $formData = $form->getData();
            $customerEmail = $customerRepository->fetchCustomerByEmail($formData['email']);
            if(count($customerEmail) >= 1)
            {
                $request1->getSession()->getFlashBag()->set('notice', 'Tento email je již zaregistrován!');
                return $this->redirect($this->generateUrl('_objednavka', array('transport' => $transport, 'car' => $car)));
            }
            else {
                $customerRepository->addNewCustomer($formData);
                $customerId = $customerRepository->fetchLastCustomer();
                $order = array('datum' => new \DateTime(),
                            'zakaznici_id' => $customerId,
                            'preprava_id' => $transport,
                            'auto_id' => $car);
                $ordersRepository->addNewOrder($order);
                $request1->getSession()->getFlashBag()->set('notice', 'Objednávka byla úspěšně vytvořena, v nejbližší době vás budeme kontaktovat!');
                return $this->redirect($this->generateUrl('autodoprava_app_homepage'));
            }
        }


        return $this->render('AutodopravaAppBundle:Preprava:Objednavka.html.twig', array(
               'carName' => $carName,
               'transportName' => $transportName,
               'formReg' => $formReg->createView(),
               'form' => $form->createView()
        ));    
    }

}
