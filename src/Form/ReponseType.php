<?php

// src/Form/ReponseType.php
namespace App\Form;

use App\Entity\Reponse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\User;


class ReponseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('user', EntityType::class, [
            'class' => User::class,
            'choice_label' => function ($user) {
                return $user->getNom() . ' ' . $user->getPrenom(); // Ou simplement 'email'
            },
            'placeholder' => 'Sélectionnez un utilisateur',
            'attr' => ['class' => 'form-select'],
        ])
        ->add('contenu', TextareaType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Écrivez votre réponse ici...'],
            'required' => false,
        ])
        ->add('dateCreation', DateTimeType::class, [
            'widget' => 'single_text',
            'attr' => ['class' => 'form-control'],
            'required' => false,
            'data' => new \DateTime(),
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reponse::class,
        ]);
    }
}

