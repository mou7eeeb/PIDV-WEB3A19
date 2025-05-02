<?php

namespace App\Form;

use App\Entity\Inscription;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('userId', IntegerType::class, [
                'label' => 'Utilisateur',
                'required' => true,
                'attr' => [
                    'min' => 1,
                    'placeholder' => 'Identifiant de l\'utilisateur'
                ],
                'error_bubbling' => false,
            ])
            ->add('formationId', IntegerType::class, [
                'label' => 'Formation',
                'required' => true,
                'attr' => [
                    'min' => 1,
                    'placeholder' => 'Identifiant de la formation'
                ],
                'error_bubbling' => false,
            ])
            ->add('dateInscription', DateType::class, [
                'label' => 'Date d\'inscription',
                'required' => true,
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'yyyy-MM-dd',
                'attr' => [
                    'max' => (new \DateTime())->format('Y-m-d'),
                    'placeholder' => 'Date d\'inscription'
                ],
                'error_bubbling' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
            'validation_groups' => ['Default'],
            'attr' => [
                'novalidate' => 'novalidate',
            ],
        ]);
    }
}
