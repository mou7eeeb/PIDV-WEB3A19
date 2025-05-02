<?php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('publication_id', TextType::class, [
                'label' => 'Publication ID',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Identifiant unique de la formation'
                ],
                'error_bubbling' => false,
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom de la formation',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Nom complet de la formation'
                ],
                'error_bubbling' => false,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Description détaillée de la formation',
                    'rows' => 5
                ],
                'error_bubbling' => false,
            ])
            ->add('duree', IntegerType::class, [
                'label' => 'Durée (heures)',
                'required' => true,
                'attr' => [
                    'min' => 1,
                    'placeholder' => 'Durée en heures'
                ],
                'error_bubbling' => false,
            ])
            ->add('nombre_places', IntegerType::class, [
                'label' => 'Nombre de places',
                'required' => true,
                'attr' => [
                    'min' => 1,
                    'placeholder' => 'Nombre de places disponibles'
                ],
                'error_bubbling' => false,
            ])
            ->add('prix', MoneyType::class, [
                'label' => 'Prix (€)',
                'required' => true,
                'currency' => 'EUR',
                'scale' => 2,
                'attr' => [
                    'placeholder' => 'Prix en euros'
                ],
                'error_bubbling' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
            'validation_groups' => ['Default'],
            'attr' => [
                'novalidate' => 'novalidate',
            ],
        ]);
    }
}
