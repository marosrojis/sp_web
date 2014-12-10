<?php

namespace Autodoprava\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Autodoprava\AppBundle\Model\OtherRepository;
use Symfony\Component\HttpFoundation\Request;

/**
 * Třída sloužící pro správu kontaktu firmy
 */
class KontaktController extends Controller
{
    /**
     * Akce sloužící pro editaci informací o firmě
     * @param  Request $request request formuláře
     */
    public function editAction(Request $request)
    {
        $otherRepository = $this->get('otherRepository');
        $contact = $otherRepository->fetchContactCompany()[0];
        
        $form = $this->createFormBuilder($contact)
            ->add('email', 'email')
            ->add('telefon', 'text', array(
        	'required' => false,
        	))
            ->add('mobil', 'text')
            ->add('ulice', 'text')
            ->add('mesto', 'text')
            ->add('psc', 'text')
            ->getForm();
        $form->handleRequest($request);

        if($form->isValid())
        {
            $formData = $form->getData();
            $otherRepository->editContact($formData);

            $request->getSession()->getFlashBag()->set('notice', 'Kontakty byly editovány');
            return $this->redirect($this->generateUrl('indexAdmin'));
        }

        return $this->render('AutodopravaAppBundle:Kontakt:edit.html.twig', array(
                'form' => $form->createView(),
            ));    
    }
}
