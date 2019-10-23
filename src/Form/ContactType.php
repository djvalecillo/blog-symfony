<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                "constraints" => [
                    new NotBlank([
                        'message' => 'Your name may not be blank.'
                    ])
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('email', null, [
                "constraints" => [
                    new NotBlank([
                        'message' => 'Your email may not be blank.'
                    ])
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('message', TextareaType::class, [
                "constraints" => [
                    new NotBlank([
                        'message' => 'Your message may not be blank.'
                    ])
                ],
                'attr' => [
                    'rows' => 8,
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
