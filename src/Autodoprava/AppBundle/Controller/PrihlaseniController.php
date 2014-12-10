<?php

namespace Autodoprava\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Třída pro přihlášení do redakčního systému  
 * @author Marek Rojík
 */
class PrihlaseniController extends Controller
{
	
    /**
     * Metoda pro ověření přihlášení do redakčního systému
     * @param  Request $request request formuláře
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR
                );
        } elseif (null !== $session &&
            $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        return $this->render('AutodopravaAppBundle:Prihlaseni:login.html.twig', array(
            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }

}
