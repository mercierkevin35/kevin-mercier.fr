<?php

namespace App\Form\Type;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("from", EmailType::class, [
                    'label'=> 'Votre Email',
                    'attr' =>  ['placeholder' => 'Veuillez saisir votre adresse email']
                ])
            ->add("subject", TextType::class, [
                    'label'=> 'Objet',
                    'attr' =>  ['placeholder' => 'Veuillez saisir l\'objet de votre message']
                ])
            ->add("message", TextareaType::class, [
                    'label'=> 'Votre message',
                    'attr' =>  [
                            'placeholder' => 'Veuillez saisir votre message ici',
                            'rows' => 20
                        ]
                ])
            ->add("send", SubmitType::class, ['label' => 'Envoyer']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
