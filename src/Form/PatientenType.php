<?php

namespace App\Form;

use App\Entity\Patienten;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naam')
            ->add('geboortedatum',DateType::class,
                ['widget'=>'single_text'])
            ->add('adres')
            ->add('email')
            ->add('telefoonummer')
            ->add('verzekeringsnummer')
            ->add('aandoeningen')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patienten::class,
        ]);
    }
}
