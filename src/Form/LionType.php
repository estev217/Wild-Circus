<?php

namespace App\Form;

use App\Entity\Lesson;
use App\Entity\User;
use App\Entity\Wish;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', IntegerType::class, [
                'label' => 'Nbre de participants',
                'attr' => [
                    'min' => 1,
                ]
            ])
            ->add('lesson', EntityType::class, [
                'class' => Lesson::class,
                'data' => function (Lesson $lesson) {
                    return $lesson->getCategory();
                }])
            ->add('save', SubmitType::class, [
                'label' => 'Ajouter au panier'
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
