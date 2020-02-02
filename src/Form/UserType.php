<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => ' ',
            ])
            ->add('firstname', TextType::class, [
                'label' => ' '
            ])
            ->add('lastname', TextType::class, [
                'label' => ' '
            ])
            ->add('nickname', TextType::class, [
                'label' => ' '
            ])
            ->add('address', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('code', NumberType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('city', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('region', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('telephone', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])
            ->add('is_circus', ChoiceType::class, [
                'label' => ' ',
                'placeholder' => ' ',
                'choices'  => [
                    'Oui' => true,
                    'Non' => false,
                ]
            ])
            ->add('circus_name', TextType::class, [
                'label' => ' ',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
