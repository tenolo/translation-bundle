<?php

namespace Tenolo\Bundle\TranslationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Tenolo\Bundle\AddressBundle\Entity\Country;
use Tenolo\Bundle\TranslationBundle\Entity\Language;

/**
 * Class LoadCountryData
 * @package Tenolo\Bundle\TranslationBundle\DataFixtures\ORM
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 21.01.2015
 */
class LoadLanguageData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $german = new Language();
        $german->setLocale('de');

        $english = new Language();
        $english->setLocale('en');

        $french = new Language();
        $french->setLocale('fr');

        $manager->persist($german);
        $manager->persist($english);
        $manager->persist($french);
        $manager->flush();

        $this->addReference('language-de', $german);
        $this->addReference('language-en', $english);
        $this->addReference('language-fr', $french);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}