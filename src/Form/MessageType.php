<?php

namespace App\Form;

use App\Entity\Wish;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price', IntegerType::class, [
                'label' => 'Montant de la prestation en €',
                'attr' => [
                    'min' => 1,
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Accompagnez votre proposition d\'un message',
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville où se situera votre cirque',
            ])
            ->add('department', TextType::class, [
                'label' => 'Département',
            ])
            ->add('location', TextType::class, [
                'label' => 'Lieu exact',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Wish::class,
        ]);
    }
}
