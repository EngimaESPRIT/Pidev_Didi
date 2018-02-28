<?php

namespace GestionEJBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AjoutEquipe extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('capital')->add('groupe')->add('participations')->add('continent')->add('victoires')->add('entraineur')->add('classementfifa')->add('matchescm')->add('butscm')->add('matchwins')->add('matchlosses')->add('matchdraws')->add('drapeau',FileType::class)->add('photoequipe')->add('logofederation')->add('Ajout Equipe',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionEJBundle\Entity\Equipe'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionejbundle_equipe';
    }


}
