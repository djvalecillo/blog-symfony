<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;


class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                "constraints" => [
                    new NotBlank([
                        'message' => 'Your title may not be blank.'
                    ])
                ]
            ])
            ->add('text', TextareaType::class, [
                "constraints" => [
                    new NotBlank([
                        'message' => 'Your text may not be blank.'
                    ])
                ],
                'attr' => [
                    'rows' => 15
                ]
            ])
            ->add('image', FileType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
