<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\AdminControlPanelBundle\Form\Type\BaseType;
use Tenolo\Bundle\TranslationBundle\Entity\Token;

/**
 * Class TokenType
 *
 * @package Tenolo\Bundle\TranslationBundle\Form\Type
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TokenType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // basic data
        $basic = $builder->create('basic', 'form', [
            'label'        => 'Allgemein',
            'inherit_data' => true
        ]);
        $basic->add('name', 'text', [
            'label' => 'Name',
            'attr'  => [
                'help_text' => 'Der Name des Token.'
            ]
        ]);
        $builder->add($basic);

        // basic data
        $domain = $builder->create('domainWrapper', 'form', [
            'label'        => 'Domain',
            'inherit_data' => true
        ]);
        $domain->add('domain', 'entity', [
            'label'    => 'Domain',
            'property' => 'name',
            'class'    => 'TenoloTranslationBundle:Domain',
            'attr'     => [
                'help_text' => 'Wählen Sie die Domain aus.'
            ]
        ]);
        $builder->add($domain);
    }

    /**
     * @inheritDoc
     */
    public function getParent()
    {
        return BaseType::class;
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Token::class,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getBlockPrefix()
    {
        return $this->getName();
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'language_token';
    }
} 