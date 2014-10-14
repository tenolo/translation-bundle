<?php

namespace Tenolo\TranslationBundle\Form\Type;

use Tenolo\AdminControlPanelBundle\Form\Type\BaseType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class TokenType
 * @package Tenolo\TranslationBundle\Form\Type
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
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => 'Tenolo\TranslationBundle\Entity\Token',
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