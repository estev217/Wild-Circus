<?php

namespace App\Form;

use App\Entity\Lesson;
use App\Entity\User;
use App\Entity\Wish;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WishType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lesson', EntityType::class, [
                'class' => Lesson::class,
                'label' => 'Choisissez un cours',
                'placeholder' => ' ',
                'required'   => true,
                'choice_label' => function (Lesson $lesson) {
                    return $lesson->getName();
                }])
            ->add('number', IntegerType::class, [
                'label' => 'Choisissez le nombre de participants',
                'attr' => [
                    'min' => 1,
                ]
            ])
            ->add('validation', CheckboxType::class, [
                'label' => 'J\'accepte de recevoir des messages de la part des cirques concernant cette demande',
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
