<?php

namespace Autodoprava\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Autodoprava\AppBundle\Model\CarsRepository;
use Autodoprava\AppBundle\Model\FotoRepository;

/**
 * Třída starající se o správu fotek aut
 * @author Marek Rojík
 */
class FotoController extends Controller
{
    /**
     * Akce sloužící pro vytvoření stránky se všemi fotkami určitého auta
     * @param  $idCar ID auta
     */
    public function fotoCarAction($idCar)
    {
        $carsRepository = $this->get('carsRepository');
        $fotoRepository = $this->get('fotoRepository');

        $carName = $carsRepository->fetchCarNameById($idCar);
        $fotos = $fotoRepository->fetchFotoCars($idCar);

        return $this->render('AutodopravaAppBundle:Foto:fotoCar.html.twig', array(
            'carName' => $carName,
            'fotos' => $fotos,
            ));    
    }

    /**
     * Akce sloužící pro smazání fotky daného auta
     * @param  $id ID auta
     */
    public function removeAction($id)
    {
        $fotoRepository = $this->get('fotoRepository');
        $idCar = $fotoRepository->fetchFotoById($id);

        $dir = __DIR__.'/../../../../web/bundles/app/img/cars/';
        $nameImage = $fotoRepository->fetchFotoId($id);
        unlink($dir.$nameImage);

        $fotoRepository->deleteFoto($id);

        return $this->redirect($this->generateUrl('foto_car', array('idCar' => $idCar)));
    }
}
