<?php

namespace Autodoprava\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Autodoprava\AppBundle\Model\OtherRepository;

/**
 * Třída sloužící pro editaci stránek pomocí editoru v redakčním systému
 * @author Marek Rojík
 */
class PageController extends Controller
{
    /**
     * Akce sloužící pro vytvoření stránky, která slouží pro zvolení dané stránky, která se má editovat
     */
    public function indexAction()
    {
        return $this->render('AutodopravaAppBundle:Page:index.html.twig', array(
            )); 
    }

    /**
     * Akce sloužící pro změnu informací o firmě
     * @param  Request $request request formuláře
     */
    public function oNasAction(Request $request)
    {
        $id = 1;
        $otherRepository = $this->get('otherRepository');
        $form = $this->createFormPage($request, $id, $otherRepository);       

        if ($form->isValid()) {
            $formData = $form->getData();
            $otherRepository->editContent($id, $formData);
            
            $request->getSession()->getFlashBag()->set('notice', 'Stránka byla editována');
            return $this->redirect($this->generateUrl('indexPage'));
        }

        return $this->render('AutodopravaAppBundle:Page:page.html.twig', array(
                'form' => $form->createView(),
                'pageName' => "O nás",
            ));    
    }

    /**
     * Akce sloužící pro změnu nabídky firmy
     * @param  Request $request request formuláře
     */
    public function nabidkaAction(Request $request)
    {
        $id = 2;
        $otherRepository = $this->get('otherRepository');
        $form = $this->createFormPage($request, $id, $otherRepository);

        if ($form->isValid()) {
            $formData = $form->getData();
            $otherRepository->editContent($id, $formData);
            
            $request->getSession()->getFlashBag()->set('notice', 'Stránka byla editována');
            return $this->redirect($this->generateUrl('indexPage'));
        }

        return $this->render('AutodopravaAppBundle:Page:page.html.twig', array(
                'form' => $form->createView(),
                'pageName' => "Nabídka",
            ));    
    }

    /**
     * Akce sloužící pro změnu textu na stránce Stěhování
     * @param  Request $request request formuláře
     */
    public function stehovaniAction(Request $request)
    {
        $id = 3;
        $otherRepository = $this->get('otherRepository');
        $form = $this->createFormPage($request, $id, $otherRepository);

        if ($form->isValid()) {
            $formData = $form->getData();
            $otherRepository->editContent($id, $formData);
            
            $request->getSession()->getFlashBag()->set('notice', 'Stránka byla editována');
            return $this->redirect($this->generateUrl('indexPage'));
        }

        return $this->render('AutodopravaAppBundle:Page:page.html.twig', array(
                'form' => $form->createView(),
                'pageName' => "Stěhování",
            ));    
    }

    /**
     * Akce sloužící pro změnu textu na stránce Skladování
     * @param  Request $request request formuláře
     */
    public function skladovaniAction(Request $request)
    {
        $id = 4;
        $otherRepository = $this->get('otherRepository');
        $form = $this->createFormPage($request, $id, $otherRepository);

        if ($form->isValid()) {
            $formData = $form->getData();
            $otherRepository->editContent($id, $formData);
            
            $request->getSession()->getFlashBag()->set('notice', 'Stránka byla editována');
            return $this->redirect($this->generateUrl('indexPage'));
        }

        return $this->render('AutodopravaAppBundle:Page:page.html.twig', array(
                'form' => $form->createView(),
                'pageName' => "Skladování",
            ));    
    }

    /**
     * Metoda pro vytvoření editoru pro změnu textu
     * @param  Request $request    request formuláře
     * @param  $id         ID stránky
     * @param  $repository model
     */
    public function createFormPage(Request $request, $id, $repository)
    {
        $content = $repository->fetchTextPage($id);
        $text = array('obsah' => $content);

        $form = $this->createFormBuilder($text)
            ->add('obsah', 'textarea', array(
                'attr' => array(
                    'class' => 'tinymce',
                    'data-theme' => 'simple' // simple, advanced, bbcode
                )))
            ->getForm();
        $form->handleRequest($request);

        return $form;
    }

}
