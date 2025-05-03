<?php
// src/Form/CandidatureType.php

namespace App\Form;

use App\Entity\Candidature;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Positive;

class CandidatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('userId', IntegerType::class, [
                'label' => "ID Utilisateur *",
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank(['message' => "Ce champ est obligatoire"]),
                    new Positive(['message' => "Doit être un nombre positif"])
                ]
            ])
            ->add('missionId', IntegerType::class, [
                'label' => "ID Mission *",
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank(['message' => "Ce champ est obligatoire"]),
                    new Positive(['message' => "Doit être un nombre positif"])
                ]
            ])
            ->add('lettreMotivation', TextareaType::class, [
                'label' => "Lettre de motivation *",
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 8,
                    'placeholder' => 'Minimum 100 caractères...'
                ],
                'constraints' => [
                    new NotBlank(['message' => "Ce champ est obligatoire"]),
                    new Length([
                        'min' => 100,
                        'max' => 2000,
                        'minMessage' => "Minimum {{ limit }} caractères requis",
                        'maxMessage' => "Maximum {{ limit }} caractères autorisés"
                    ])
                ]
            ])
            ->add('reponseQuestions', TextareaType::class, [
                'label' => "Réponses aux questions",
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 5,
                    'placeholder' => 'Optionnel - maximum 2000 caractères...'
                ],
                'constraints' => [
                    new Length([
                        'max' => 2000,
                        'maxMessage' => "Maximum {{ limit }} caractères autorisés"
                    ])
                ]
            ])
            ->add('imageFile', FileType::class, [
                'label' => "Photo de profil",
                'required' => false,
                'mapped' => false,
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => ['image/jpeg', 'image/png'],
                        'mimeTypesMessage' => 'Formats acceptés: JPG/PNG',
                        'maxSizeMessage' => 'Taille maximale: {{ limit }}'
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidature::class,
            'attr' => ['novalidate' => 'novalidate']
        ]);
    }
}