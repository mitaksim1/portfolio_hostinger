<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['attr' => ['placeholder' => 'Nom *', 'class' => 'form-control']])
            ->add('email', EmailType::class, ['attr' => ['placeholder' => 'Email *', 'class' => 'form-control']])
            ->add('message', TextareaType::class, ['attr' => ['placeholder' => 'Message *', 'class' => 'form-control']])
            ->add('envoyer', SubmitType::class, ['attr' => ['class' => 'btn btn-primary btn-xl text-uppercase' ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
