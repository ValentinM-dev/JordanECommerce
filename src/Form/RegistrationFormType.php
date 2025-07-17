<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Email;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       $builder
        ->add('email',EmailType::class,[
                'attr' =>[
                    'class' => 'form-control jordan-border jordan-text jordan-bg',
                    'minLength' => 2,
                    'maxLength' => 180,
                    'autocomplete' => 'email',
                    'placeholder' => 'user@exemple.com',
                ],
                'label' => 'Adresse e-mail',
                'label_attr' =>[
                    'class' => 'form-label',
                ],
                'constraints' =>[
                    new NotBlank([
                        'message' => 'Merci de saisir votre adresse e-mail',
                    ]),

                    new Length([
                        'max' => 180,
                        'maxMessage' => 'Votre adresse e-mail peut contenir maximum {{ limit }} caractères',
                    ]),

                    new Email([
                        'message' => 'Merci de saisir une adresse e-mail valide',
                    ])
                ],
        ])
        ->add('agreeTerms', CheckboxType::class,[
                'attr' =>[
                    'class' => 'form_checkk-input ms-3',
                ],
                'label' => 'J\'accepte les mentions légales',
                'mapped' => false,
                'constraints' =>[
                    new IsTrue([
                        'message' => 'Veuillez accepter les mentions légales.',
                    ]),
                ],
        ])
        ->add('plainPassword', RepeatedType::class,[
            'type' => PasswordType::class,
            'invalid_message' => 'Les mots de passe ne correspondent pas',
            'first_options' => [
                'attr' =>[
                    'class' => 'form-control jordan-border jordan-text jordan-bg',
                    'placeholder' => 'Mot de passe',
                ],
                'label' => 'Mot de passe :',
                'label_attr' =>[
                    'class' => 'form-label',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de saisir un mot de passe',
                    ]),

                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au minimum {{ limit }} caractéres',
                        'max' => 4096,
                    ]),

                    new Regex([
                        'pattern' => '/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>_\-+=\/~`\[\];\'])[A-Za-z\d!@#$%^&*(),.?":{}|<>_\-+=\/~`\[\];\']{10,}$/',
                        'message' => 'Votre mot de passe doit contenir au moins 10 caractéres, une majuscule, un chiffre, un caractère spécial parmis (!@#$%^&*(),.?":{}|<>_-+=/~\[];\') et ne doit pas contenir d\'espace.',
                    ])
                ],
                'mapped' => false,
            ],
            'second_options' => [
                'attr' =>[
                    'class' => 'form-control jordan-border jordan-text jordan-bg',
                    'placeholder' => ' Confirmer le mot de passe',
                ],
                'label' => 'Confirmer le mot de passe :',
                'label_attr' =>[
                    'class' => 'form-label',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de confirmer le mot de passe',
                    ]),

                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au minimum {{ limit }} caractéres',
                        'max' => 4096,
                    ]),

                    new Regex([
                        'pattern' => '/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>_\-+=\/~`\[\];\'])[A-Za-z\d!@#$%^&*(),.?":{}|<>_\-+=\/~`\[\];\']{10,}$/',
                        'message' => 'Votre mot de passe doit contenir au moins 10 caractéres, une majuscule, un chiffre, un caractère spécial parmis (!@#$%^&*(),.?":{}|<>_-+=/~\[];\') et ne doit pas contenir d\'espace.',
                    ])
                ],
                'mapped' => false,
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
