<?php

namespace App\Form;

use App\Entity\Medicijnen;
use App\Entity\Patienten;
use App\Entity\Recepten;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReceptType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datum',DateType::class,
                ['widget'=>'single_text'])
            ->add('periode')
            ->add('medicijn', EntityType::class,
            [
                'class' => Medicijnen::class,
                'choice_label' => 'naam'
                ])
            ->add('patient',EntityType::class,
                [
                    'class' => Patienten::class,
                    'choice_label' => 'naam'
                ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recepten::class,
        ]);
    }
}
