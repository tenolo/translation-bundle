<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\AdminControlPanelBundle\Form\Type\BaseType;
use Tenolo\Bundle\CoreBundle\Form\Type\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Tenolo\Bundle\TranslationBundle\Form\Type\Entities\TokenEntityType;
use Tenolo\Bundle\TranslationBundle\Form\Type\Entities\LanguageEntityType;
use Tenolo\Bundle\TranslationBundle\Entity\Translation;

/**
 * Class TranslationType
 * @package Tenolo\Bundle\TranslationBundle\Form\Type
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 06.08.14
 */
class TranslationType extends AbstractType
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
        $basic->add('language', LanguageEntityType::class, array(
            'attr' => array(
                'help_text' => 'Wählen Sie bitte die Sprache aus, in die übersetzt wird.'
            )
        ));
        $basic->add('token', TokenEntityType::class, array(
            'attr' => array(
                'help_text' => 'Wählen Sie den Token aus, für den eine Übersetzung angelegt werden soll.'
            )
        ));
        $basic->add('translation', TextareaType::class, array(
            'label' => 'Übersetzung',
            'attr' => array(
                'rows' => 5,
                'help_text' => 'Tragen Sie hier die eigentliche Übersetzung ein.'
            )
        ));
        $builder->add($basic);

        parent::buildForm($builder, $options);
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => Translation::class,
        ));
    }

    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return BaseType::class;
    }

    /**
     * @inheritDoc
     */
    public function getBlockPrefix()
    {
        return 'tenolo_translation_'.\Symfony\Component\Form\AbstractType::getBlockPrefix();
    }
}