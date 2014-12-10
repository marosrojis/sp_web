<?php

namespace Autodoprava\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Třída pro vytvoření formuláře pro auto
 */
class CarForm extends AbstractType
{
    /**
     * Metoda sloužící pro vytvoření formuláře
     * @param  FormBuilderInterface $builder formulář
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nazev', 'text');
        $builder->add('objem', 'text');
        $builder->add('nosnost', 'text');
        $builder->add('pocet', 'text');
        $builder->add('vybaveni', 'text', array(
        	'required' => false,
        	));
        $builder->add('pocet_sezeni', 'text', array(
        	'required' => false,
        	));
        $builder->add('technika', 'text', array(
        	'required' => false,
        	));
        $builder->add('delka_plochy', 'text', array(
        	'required' => false,
        	));
        $builder->add('cena', 'text');
        $builder->add('preprava_id', 'choice', array(
            'choices'   => array(
                'empty_value' => false,
                '1'   => 'Pick-up přeprava',
                '2' => 'Dodávková přeprava',
                '3'   => 'Nákladní přeprava',
            )
        ));
        $builder->add('image', 'file', array(
            'required' => false,
            ));
    }

    /**
     * Metoda vracející název auta
     */
    public function getName()
    {
        return 'car';
    }
}
