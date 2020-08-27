<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datetime', Datetype::class, [
                'attr' => ['class' => 'form-control col-md-2 m-auto'],
                'widget' => 'single_text',
            ])
            ->add('meal', TextareaType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('sleep', TextareaType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('layers', TextareaType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('health', TextareaType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('activity', TextareaType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('notes', TextareaType::class, [
                'attr' => ['class' => 'form-control']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}