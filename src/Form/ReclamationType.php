<?php

namespace App\Form;

use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('userId')
            ->add('missionId')
            ->add('titre')
            ->add('description')
            ->add('status', ChoiceType::class, [
                'choices' => [
                    '🕒 En attente' => 'en attente',
                    '📂 Ouvert' => 'ouvert',
                    '✅ Traité' => 'traité',
                ],
                'label' => 'Statut',
                'data' => 'en attente',]) // valeur sélectionnée par défaut dans le formulaire
            ->add('date', null, [
                'widget' => 'single_text'
            ])
           
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
