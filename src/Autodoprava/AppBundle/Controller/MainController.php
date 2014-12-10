<?php

namespace Autodoprava\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Autodoprava\AppBundle\Model\OtherRepository;

/**
 * Třída sloužící pro zobrazení obsahu u jednoduchých stránek
 * @author Marek Rojík
 */
class MainController extends Controller
{
    /**
     * Akce sloužící pro vypsání informací o firmě na titulní stránce
     */
    public function indexAction()
    {
        $otherRepository = $this->get('otherRepository');
        $about_company = $otherRepository->fetchTextPage(1);
        $contact = $otherRepository->fetchContactCompany()[0];
        return $this->render('AutodopravaAppBundle:Main:index.html.twig', array('about' => $about_company, 'contact' => $contact));
    }

    /**
     * Akce sloužící pro vypsání nabídky na stránce Nabídka
     */
    public function offerAction()
    {
        $otherRepository = $this->get('otherRepository');
        $offer = $otherRepository->fetchTextPage(2);
        return $this->render('AutodopravaAppBundle:Main:nabidka.html.twig', array(
            'offer' => $offer,
            )); 
    }

    /**
     * Akce sloužící pro vypsání kontaktů na stránce Kontakt
     */
    public function contactAction()
    {
        $otherRepository = $this->get('otherRepository');
        $contact = $otherRepository->fetchContactCompany()[0];
        return $this->render('AutodopravaAppBundle:Main:kontakt.html.twig', array(
            'contact' => $contact,
            )); 
    }

}
