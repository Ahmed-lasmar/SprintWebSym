<?php

namespace App\Form;

use App\Entity\FicheDePaie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheDePaieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idPer')
            ->add('salaireInit')
            ->add('idPrime')
            ->add('salaireTotal')
            ->add('datePaiement')
            ->add('etatPaiement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FicheDePaie::class,
        ]);
    }
}
