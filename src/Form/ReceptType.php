<?php

namespace App\Form;

use App\Entity\Medicijnen;
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
            ->add('medicijn', EntityType::class,[
                'class' => Medicijnen::class,
                'choice_label' => 'verzekerd'
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
