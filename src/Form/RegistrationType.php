<?php

namespace App\Form;

use App\Entity\Nanny;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('LastName')
            ->add('FirstName')
            ->add('Address')
            ->add('postal')
            ->add('City')
            ->add('Phone')
            ->add('Diploma')
            ->add('description')
            ->add('email')
            ->add('password')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Nanny::class,
        ]);
    }
}
