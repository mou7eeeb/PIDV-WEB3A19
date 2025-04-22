<?php

namespace App\Form;

use App\Entity\Reclamation;
use App\Entity\User;
use App\Entity\Mission;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email', // Change en 'nom' ou autre champ si tu préfères
                'label' => 'Utilisateur',
                'placeholder' => 'Sélectionnez un utilisateur',
            ])
            ->add('mission', EntityType::class, [
                'class' => Mission::class,
                'choice_label' => 'titre',
                'label' => 'Mission',
                'placeholder' => 'Sélectionnez une mission',
            ])
            ->add('titre', TextType::class, [
                'label' => 'Titre de la réclamation',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'En attente' => 'en attente',
                    'Ouvert' => 'ouvert',
                    'Traité' => 'traité',
                ],
                'label' => 'Statut',
            ])
            ->add('date', DateTimeType::class, [
                'widget' => 'single_text',
                'required' => false, // si la date est automatique
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
