<?php

namespace Autodoprava\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Autodoprava\AppBundle\Model\CarsRepository;
use Autodoprava\AppBundle\Model\FotoRepository;
use Autodoprava\AppBundle\Form\CarForm;

/**
 * Třída starající se o správu aut v redakčním systému
 * @author Marek Rojík
 */
class AutoController extends Controller
{
    /**
     * Akce pro vytvoření stránky, kde budou všechny auta
     */
    public function indexAction()
    {
        $carsRepository = $this->get('carsRepository');
        $cars = $carsRepository->fetchAllCars();

        return $this->render('AutodopravaAppBundle:Auto:index.html.twig', array(
            'cars' => $cars
            ));    
    }

    /**
     * Akce, která se stará o změnu stavu vozidla, zda je v provozu či ne
     * @param  $id ID auta
     */
    public function editStatusAction($id)
    {
        $carsRepository = $this->get('carsRepository');
        $status = $carsRepository->fetchStatus($id);
        $status == 0 ? $status = 1 : $status = 0;
        $carsRepository->editStatus($id, $status);

        return $this->redirect($this->generateUrl('indexCar'));
    }

    /**
     * Akce, která se stará o vytvoření formuláře a přidání nového auta
     * @param  Request $request request formuláře
     */
    public function newCarAction(Request $request)
    {
        $carsRepository = $this->get('carsRepository');
        $form = $this->createForm(new CarForm());
        $form->handleRequest($request); 

        if($form->isValid())
        {
            $formData = $form->getData();
            $formData['uzivatele_id'] = $this->getUser()->getId();
            $image_temp = $formData['image'];
            unset($formData['image']);
            $carsRepository->addNewCar($formData);
            
            if($image_temp != null)
            {
                if($image_temp->getError() != '0')
                {
                    $request->getSession()->getFlashBag()->set('notice', 'Auto bylo přidáno/editováno, ale nebylo nahráno foto (velikost fota musí být < 2 MB)');
                    return $this->redirect($this->generateUrl('indexCar'));
                }
                $lastId = $carsRepository->findLastIdCar();
                $this->uploadFoto($request, $image_temp, $lastId);
            }

            $request->getSession()->getFlashBag()->set('notice', 'Auto bylo vytvořeno');
            return $this->redirect($this->generateUrl('indexCar'));
        }
        
        return $this->render('AutodopravaAppBundle:Auto:car.html.twig', array(
            'form' => $form->createView(),
            'typForm' => "Přidat auto",
            ));    
    }

    /**
     * Akce sloužící pro editování údajů u auta
     * @param  Request $request request formuláře
     * @param  $id      ID auta
     */
    public function editCarAction(Request $request, $id)
    {
        $carsRepository = $this->get('carsRepository');
        $data = $carsRepository->fetchCarById($id)[0];
        $data['image'] = null;
        $form = $this->createForm(new CarForm(), $data);
        $form->handleRequest($request); 

        if($form->isValid())
        {
            $formData = $form->getData();
            $formData['uzivatele_id'] = $this->getUser()->getId();
            $image_temp = $formData['image'];
            unset($formData['image']);
            $carsRepository->editCar($id, $formData);

            if($image_temp != null)
            {
                if($image_temp->getError() != '0')
                {
                    $request->getSession()->getFlashBag()->set('notice', 'Auto bylo přidáno/editováno, ale nebylo nahráno foto (velikost fota musí být < 2 MB)');
                    return $this->redirect($this->generateUrl('indexCar'));
                }
                $this->uploadFoto($request, $image_temp, $id);
            }

            $request->getSession()->getFlashBag()->set('notice', 'Auto bylo editováno');
            return $this->redirect($this->generateUrl('indexCar'));
        }
        
        return $this->render('AutodopravaAppBundle:Auto:car.html.twig', array(
            'form' => $form->createView(),
            'typForm' => "Editovat auto",
            )); 
    }

    /**
     * Metoda sloužící pro upload fotky auta
     * @param  Request $request request formuláře
     * @param  UploaderFile $image   fotka
     * @param  $idCar   ID auta
     */
    public function uploadFoto($request, $image, $idCar)
    {
        $fotoRepository = $this->get('fotoRepository');
        $countFoto = $fotoRepository->fetchCountFoto();

        if(($image instanceof UploadedFile))
        {
            $originalName = $image->getClientOriginalName();
            $name_array = explode('.', $originalName);
            $file_type = $name_array[sizeof($name_array) - 1]; 
            $valid_type = array('jpg', 'jpeg', 'bmp', 'png', 'gif');
            if(in_array(strtolower($file_type), $valid_type))
            {
                $fileName = "car-".$countFoto.".".$file_type;
                $dir = __DIR__.'/../../../../web/bundles/app/img/cars/';
                $image->move($dir, $fileName);

                $infoFoto = array('soubor' => $fileName, 'auto_id' => $idCar);
                $fotoRepository->addNewFoto($infoFoto);
            }
            else
            {
                $request->getSession()->getFlashBag()->set('notice', 'Auto bylo přidáno/editováno, ale nebylo nahráno foto (špatný formát)');
                return $this->redirect($this->generateUrl('indexCar'));
            }
        }
        else
        {
            $request->getSession()->getFlashBag()->set('notice', 'Auto bylo přidáno/editováno, ale nebylo nahráno foto');
            return $this->redirect($this->generateUrl('indexCar'));
        }
    }
}
