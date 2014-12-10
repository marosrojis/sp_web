<?php

namespace Autodoprava\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Třída sloužící pro vytvoření stránky pro redakční systém
 * @author Marek Rojík
 */
class AdminController extends Controller
{
    /**
     * Akce pro vytvoření stránky, která se načte po úspěšném přihlášení
     */
    public function indexAction()
    {
        return $this->render('AutodopravaAppBundle:Admin:index.html.twig', array(
                // ...
            ));    }

}
