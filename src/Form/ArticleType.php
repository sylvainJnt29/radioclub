<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('created_at')
            // ->add('title')
            ->add('title',TextType::class,[
                'label'=>'Titre',
                'attr'=>['placeholder'=>'Ecrivez ici le titre']])
            // ->add('text')
            ->add('text',TextType::class,[
                'label'=>'Texte',
                'attr'=>['placeholder'=>'Ecrivez ici le texte']])
            ->add('imageFile', FileType::class,[
                'label'=>'Image',
                'required'=>false])
            // ->add('updated_at')
            // ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
