<?php

namespace App\Form;

use App\Entity\PhotoEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('label', TextType::class, [
                'label' => 'Name'
            ])
            ->add('AWB', ChoiceType::class, [
                'label' => 'Select an AWB mode',
                'choices'=> [
                    'Off' => 'off',
                    'Auto' => 'auto',
                    'Sunlight' => 'sunlight',
                    'Cloudy' => 'cloudy',
                    'shade' => 'shade',
                    'Tungsten' => 'tungsten',
                    'Fluorescent' => 'fluorescent',
                    'Incandescent'=> 'incandescent',
                    'Flash' => 'flash',
                    'Horizon' => 'horizon'
                ]
            ])
            ->add('exposure', ChoiceType::class, [
                'label' => 'Select an exposure mode',
                'choices' => [
                    'Off' => 'off',
                    'Auto' => 'auto',
                    'Night' => 'night',
                    'Night preview' => 'nightpreview',
                    'Black light' => 'blacklight',
                    'Spot light' => 'spotlight',
                    'Sports' => 'sports',
                    'Snow' => 'snow',
                    'Beach' => 'beach',
                    'Very long' => 'verylong',
                    'Fixed FPS' => 'fixedfps',
                    'Antishake' => 'antishake',
                    'Fireworks' => 'fireworks'
                ]
            ])
            ->add('resolutionX', NumberType::class, [
                'label' => 'Set the wide resolution in px',
                'html5' => true,
                'empty_data' => 1200,
                'required' => false,
                'attr' => [
                    'placeholder' => 'default value 1200px'
                ]
            ])
            ->add('resolutionY', NumberType::class, [
                'label' => 'Set the height resolution in px',
                'html5' => true,
                'required' => false,
                'empty_data' => 800,
                'attr' => [
                    'placeholder' => 'default value 800px'
                ]
            ])
            ->add('brightness', NumberType::class, [
                'label' => 'Set the brightness',
                'html5' => true,
                'required' => false,
                'empty_data' => 50,
                'attr' => [
                    'placeholder' => 'default value 50'
                ]
            ])
            ->add('contrast', NumberType::class, [
                'label' => 'Set the contrast',
                'html5' => true,
                'empty_data' => 50,
                'attr' => [
                    'placeholder' => 'default value 50'
                ]
            ])
            ->add('effect')
            ->add('text', TextType::class, [
                'label' => 'short text',
                'required' => false,
                'attr' => [
                    'placeholder' => '255 chars max'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PhotoEntity::class,
        ]);
    }
}
