<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

// Formulaire Symfony pour la gestion des utilisateurs
class UserType extends AbstractType
{
    // Construction du formulaire utilisateur avec ses champs et contraintes
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Champ pour le nom
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez le nom',
                ],
                'row_attr' => ['class' => 'mb-3']
            ])
            // Champ pour le prénom
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez le prénom',
                ],
                'row_attr' => ['class' => 'mb-3']
            ])
            // Champ pour l'email
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez l\'email',
                ],
                'row_attr' => ['class' => 'mb-3']
            ])
            // Champ pour le type d'utilisateur
            ->add('type_utilisateur', ChoiceType::class, [
                'label' => 'Type d\'utilisateur',
                'choices' => [
                    'Freelance' => User::USER_TYPE_FREELANCE,
                    'Formateur' => User::USER_TYPE_FORMATEUR,
                    'Employeur' => User::USER_TYPE_EMPLOYEUR,
                ],
                'attr' => ['class' => 'form-select'],
                'row_attr' => ['class' => 'mb-3']
            ])
            // Champ pour le téléphone
            ->add('telephone', TelType::class, [
                'label' => 'Téléphone',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez le numéro de téléphone',
                ],
                'row_attr' => ['class' => 'mb-3'],
            ])
        ;

        // Ajout dynamique du champ mot de passe selon le contexte (création ou édition)
        // Écouteur d'événement pour ajouter le champ mot de passe dynamiquement
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $user = $event->getData();
            $form = $event->getForm();

            // Le champ mot de passe est obligatoire uniquement lors de la création d'un nouvel utilisateur
            $isRequired = !$user || null === $user->getId();

            // Ajout du champ mot de passe au formulaire
            $form->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'mapped' => false,
                'required' => $isRequired,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => $isRequired ? 'Entrez le mot de passe' : 'Laissez vide pour conserver l\'ancien',
                    'autocomplete' => 'new-password'
                ],
                'row_attr' => ['class' => 'mb-3'],
                'help' => !$isRequired ? 'Laissez ce champ vide si vous ne souhaitez pas modifier le mot de passe' : null,
            ]);
        });
    }

    // Configuration des options du formulaire
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
