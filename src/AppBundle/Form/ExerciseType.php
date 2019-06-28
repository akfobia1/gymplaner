<?php
/**
 * Created by PhpStorm.
 * User: akfob
 * Date: 27.06.2019
 * Time: 22:41
 */

namespace AppBundle\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;




class ExerciseType extends AbstractType
{
    /**
     *
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('weight',  NumberType::class)
            ->add('sets',IntegerType::class, ['label' => 'set series'])
            ->add('reps',IntegerType::class, ['label' => 'Set Reps'])
            ->add('trainings')
            ->add('save', SubmitType::class, ['label' => 'Crate Exercise']);


    }
    /**
     *
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Exercise'
        ));
    }

}