<?php
// src/Form/MissionType.php

namespace App\Form;

use App\Entity\Mission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre *',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex: Développement application mobile'
                ],
                'help' => 'Minimum 5 caractères',
                'help_attr' => ['class' => 'form-text text-muted'],
                'required' => true
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description *',
                'attr' => [
                    'class' => 'form-control', 
                    'rows' => 5,
                    'placeholder' => 'Décrivez la mission en détail...'
                ],
                'help' => 'Minimum 10 caractères',
                'help_attr' => ['class' => 'form-text text-muted'],
                'required' => true
            ])
            ->add('competance', TextType::class, [
                'label' => 'Compétences requises *',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex: PHP, Symfony, React'
                ],
                'required' => true
            ])
            ->add('datePub', DateType::class, [
                'label' => 'Date de publication *',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'required' => true
            ])
            ->add('duree', IntegerType::class, [
                'label' => 'Durée (jours)',
                'attr' => [
                    'class' => 'form-control',
                    'min' => 0,
                    'placeholder' => 'Ex: 30'
                ],
                'required' => false
            ])
            ->add('budget', NumberType::class, [
                'label' => 'Budget (€)',
                'attr' => [
                    'class' => 'form-control',
                    'min' => 0,
                    'placeholder' => 'Ex: 5000'
                ],
                'required' => false
            ])
            ->add('questions', TextareaType::class, [
                'label' => 'Questions spécifiques',
                'attr' => [
                    'class' => 'form-control', 
                    'rows' => 3,
                    'placeholder' => 'Questions pour les candidats...'
                ],
                'required' => false
            ])
            ->add('nomEntreprise', TextType::class, [
                'label' => 'Entreprise',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom de votre entreprise'
                ],
                'required' => false
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'btn btn-primary mt-3']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
            'attr' => ['novalidate' => 'novalidate']
        ]);
    }
}