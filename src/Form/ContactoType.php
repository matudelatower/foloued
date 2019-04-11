<?php

namespace App\Form;

use App\Entity\Contacto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('calle', TextType::class, [
                'required' => true
            ])
            ->add('numeroPuerta', TextType::class, [
                'required' => true
            ])
            ->add('telefono')
            ->add('celular', TextType::class, [
                'required' => true
            ])
            ->add('mail')
            ->add('mailContacto')
            ->add('instagram')
            ->add('twitter')
            ->add('facebook')
            ->add('youtube');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contacto::class,
        ]);
    }
}
