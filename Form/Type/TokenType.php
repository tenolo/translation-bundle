<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\AdminControlPanelBundle\Form\Type\BaseType;

/**
 * Class TokenType
 * @package Tenolo\Bundle\TranslationBundle\Form\Type
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 06.08.14
 */
class TokenType extends BaseType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // basic data
        $basic = $builder->create('basic', 'form', array(
            'label' => 'Allgemein',
            'inherit_data' => true
        ));
        $basic->add('name', 'text', array(
            'label' => 'Name',
            'attr' => array(
                'help_text' => 'Der Name des Token.'
            )
        ));
        $builder->add($basic);

        // basic data
        $domain = $builder->create('domainWrapper', 'form', array(
            'label' => 'Domain',
            'inherit_data' => true
        ));
        $domain->add('domain', 'entity', array(
            'label' => 'Domain',
            'property' => 'name',
            'class' => 'TenoloTranslationBundle:Domain',
            'attr' => array(
                'help_text' => 'Wählen Sie die Domain aus.'
            )
        ));
        $builder->add($domain);

        parent::buildForm($builder, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => 'Tenolo\Bundle\TranslationBundle\Entity\Token',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'language_token';
    }
} 