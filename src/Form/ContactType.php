<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname',TextType::class,[
                'label'=>'Votre prénom',
                'attr'=>['placeholder'=>'Ecrivez ici votre prénom']])
                ->add('lastname',TextType::class,[
                'label'=>'Votre nom',
                'attr'=>['placeholder'=>'Ecrivez ici votre nom']])
                ->add('phone',TextType::class,[
                'label'=>'Votre Téléphone',
                'attr'=>['placeholder'=>'Ecrivez ici votre Téléphone']])
                ->add('email',EmailType::class,[
                'label'=>'Votre adresse mail',
                'attr'=>['placeholder'=>'Ecrivez ici votre adresse mail']])
                ->add('message',TextareaType::class,[
                'label'=>'Votre message',
                'attr'=>['placeholder'=>'Ecrivez ici votre message']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
