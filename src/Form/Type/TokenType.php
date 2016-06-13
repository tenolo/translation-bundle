<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\CoreBundle\Form\Type\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Tenolo\Bundle\CRUDAdminBundle\Form\Type\Forms\BaseFormType;
use Tenolo\Bundle\TranslationBundle\Form\Type\Entities\DomainEntityType;
use Tenolo\Bundle\TranslationBundle\Entity\Token;

/**
 * Class TokenType
 * @package Tenolo\Bundle\TranslationBundle\Form\Type
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 06.08.14
 */
class TokenType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // basic data
        $basic = $builder->create('basic', FormType::class, array(
            'label' => 'Allgemein',
            'inherit_data' => true
        ));
        $basic->add('name', TextType::class, array(
            'label' => 'Name',
            'attr' => array(
                'help_text' => 'Der Name des Token.'
            )
        ));
        $builder->add($basic);

        // basic data
        $domain = $builder->create('domainWrapper', FormType::class, array(
            'label' => 'Domain',
            'inherit_data' => true
        ));
        $domain->add('domain', DomainEntityType::class, array());
        $builder->add($domain);

        parent::buildForm($builder, $options);
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => Token::class,
        ));
    }

    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return BaseFormType::class;
    }

    /**
     * @inheritDoc
     */
    public function getBlockPrefix()
    {
        return 'tenolo_translation_'.\Symfony\Component\Form\AbstractType::getBlockPrefix();
    }
}