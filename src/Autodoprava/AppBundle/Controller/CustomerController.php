<?php

namespace Autodoprava\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Autodoprava\AppBundle\Model\CustomerRepository;

/**
 * Třída starající se o práci se zákazníky
 * @author Marek Rojík
 */
class CustomerController extends Controller
{
    /**
     * Metoda pro zobrazení údajů o zákazníkovi
     * @param  $id ID zákazníka
     */
    public function profileAction($id)
    {
        $customerRepository = $this->get('customerRepository');
        $customer = $customerRepository->fetchCustomerById($id)[0];
        $countOrders = $customerRepository->fetchCountOrdersCustomer($id);
        $countOrdersOK = $customerRepository->fetchCountOrdersOK($id);

        return $this->render('AutodopravaAppBundle:Customer:profile.html.twig', array(
        	'customer' => $customer,
        	'countOrders' => $countOrders,
        	'countOrdersOK' => $countOrdersOK
            ));    
    }
}
