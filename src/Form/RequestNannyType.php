<?php

namespace App\Form;

use App\Entity\RequestNanny;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RequestNannyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('childLastName', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('childFirstName', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('dateBirth', DateType::class, [
                'attr' => ['class' => 'form-control'],
                'widget' => 'single_text',
            ])
            ->add('startDate', Datetype::class, [
                'attr' => ['class' => 'form-control'],
                'widget' => 'single_text',
            ])
            ->add('daysChildCare', ChoiceType::class, [
                'multiple' => true,
                'expanded' => true,
                'choices' => [
                    'Lundi' => 'Lundi',
                    'Mardi' => 'Mardi',
                    'Mercredi' => 'Mercredi',
                    'Jeudi' => 'Jeudi',
                    'Vendredi' => 'Vendredi',
                    'Samedi' => 'Samedi',
                ],
            ])
            ->add('parentLastName', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('parentFirstName', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('relation', ChoiceType::class, [
                'multiple' => false,
                'expanded' => true,
                'choices' => [
                    'Mère' => 'Mère',
                    'Père' => 'Père',
                ]
            ])
            ->add('email', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('phone', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('message', TextareaType::class, [
                'attr' => ['class' => 'form-control']
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RequestNanny::class,
        ]);
    }
}
