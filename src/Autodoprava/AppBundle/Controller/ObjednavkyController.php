<?php

namespace Autodoprava\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Autodoprava\AppBundle\Model\OrdersRepository;

/**
 * Třída sloužící pro správu objednávek
 * @author Marek Rojík
 */
class ObjednavkyController extends Controller
{
    /**
     * Akce sloužící pro vypsání objednávek v redakčním systému
     */
    public function indexAction()
    {
        $ordersRepository = $this->get('ordersRepository');
        $orders = $ordersRepository->fetchOrders();

        return $this->render('AutodopravaAppBundle:Objednavky:index.html.twig', array(
                'orders' => $orders
            ));    
    }

    /**
     * Akce sloužící pro označení objednávky za vyřízenou
     * @param  $id ID objednávky
     */
    public function editAction($id)
    {
        $ordersRepository = $this->get('ordersRepository');
        $status = $ordersRepository->fetchStatus($id);
        $status == 0 ? $status = 1 : $status = 0;
        $ordersRepository->editDone($id, $status);

        return $this->redirect($this->generateUrl('indexObjednavky'));
    }    
}
