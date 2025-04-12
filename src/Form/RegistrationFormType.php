<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre nom',
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'Votre nom doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Votre nom ne peut pas dépasser {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('nom', TextType::class, [
                'label' => 'Prénom',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre prénom',
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'Votre prénom doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Votre prénom ne peut pas dépasser {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre email',
                    ]),
                    new Email([
                        'message' => 'L\'email {{ value }} n\'est pas un email valide.',
                    ]),
                ],
            ])
            ->add('telephone', TelType::class, [
                'label' => 'Téléphone',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre numéro de téléphone',
                    ]),
                    new Regex([
                        'pattern' => '/^\+?[0-9]{8,}$/',
                        'message' => 'Le numéro de téléphone n\'est pas valide',
                    ]),
                ],
            ])

            ->add('plainPassword', PasswordType::class, [
                'label' => 'Mot de passe',
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'placeholder' => 'Ex: Abc12345'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Le mot de passe doit contenir au moins {{ limit }} caractères',
                        'max' => 4096,
                    ]),
                    new Regex([
                        'pattern' => '/^(?=.*[A-Z])(?=.*[0-9]).{8,}$/',
                        'message' => 'Le mot de passe doit contenir au moins 8 caractères, commencer par une majuscule et inclure au moins un chiffre',
                    ]),
                ],
                'help' => 'Le mot de passe doit contenir au moins 8 caractères, commencer par une majuscule et inclure au moins un chiffre'
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'J\'accepte les conditions d\'utilisation',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les conditions d\'utilisation.',
                    ]),
                ],
            ])
            ->add('type_utilisateur', HiddenType::class, [
                'mapped' => true,
                'data' => User::USER_TYPE_FREELANCE
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
