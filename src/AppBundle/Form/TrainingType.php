<?php
/**
 * Created by PhpStorm.
 * User: akfob
 * Date: 27.06.2019
 * Time: 18:01
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class TrainingType extends AbstractType
{
    /**
     *
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('purpose')
            ->add('plan')
            ->add('save', SubmitType::class, ['label' => 'Create Training']);
    }
    /**
     *
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Training'
        ));
    }
}