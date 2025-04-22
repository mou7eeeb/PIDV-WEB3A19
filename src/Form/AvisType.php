<?php

namespace App\Form;

use App\Entity\Avis;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('note', IntegerType::class, [
                'required' => false,
            ])
            ->add('commentaire', TextareaType::class, [
                'required' => false,
            ])
            ->add('dateAvis', DateType::class, [
                'widget' => 'single_text',
                'data' => new \DateTime(),
                'required' => false,
            ])
            ->add('typeAvis', ChoiceType::class, [
                'choices' => [
                    'Formation' => 'formation',
                    'Service' => 'service',
                    'Autre' => 'autre',
                ],
                'placeholder' => 'Choisir un type d\'avis',
                'required' => false,
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                'placeholder' => 'Choisir un utilisateur',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
