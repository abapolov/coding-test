<?php

namespace App\Form;

use App\Entity\StoreBranchLocation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class StoreBranchLocationType
 *
 * @package App\Form
 */
class StoreBranchLocationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Branch location name',
                'attr'  => [
                    'placeholder' => 'Name'
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Branch location address',
                'attr'  => [
                    'placeholder' => 'Address'
                ]
            ])
            ->add('numberOfEmployees', NumberType::class, [
                'label' => 'Branch location number of employees',
                'attr'  => [
                    'placeholder' => 'Number of employees'
                ]
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StoreBranchLocation::class,
        ]);
    }
}
