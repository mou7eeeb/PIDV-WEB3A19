<?php

// src/Form/ReponseType.php
namespace App\Form;

use App\Entity\Reponse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ReponseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('userId')
            ->add('contenu', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Écrivez votre réponse ici...'],
                'required' => false, // Désactive la validation HTML côté serveur
            ])
            ->add('dateCreation', DateTimeType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'required' => false, // Désactive la validation HTML côté serveur
                'data' => new \DateTime(), // Valeur par défaut (date et heure actuelles)
            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reponse::class,
        ]);
    }
}

