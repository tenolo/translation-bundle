<?php

namespace Tenolo\Bundle\TranslationBundle\Repository;

use Tenolo\Bundle\CoreBundle\Repository\BaseEntityRepository;
use Tenolo\Bundle\TranslationBundle\Entity\Domain;
use Tenolo\Bundle\TranslationBundle\Entity\Language;

/**
 * Class TranslationRepository
 * @package Tenolo\Bundle\TranslationBundle\Repository
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 05.08.14
 */
class TranslationRepository extends BaseEntityRepository
{

    /**
     * @param Language $language
     * @param Domain $domain
     * @param array $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @return array
     */
    public function findAllByLanguageAndDomain(Language $language, Domain $domain, array $orderBy = null, $limit = null, $offset = null)
    {
        $qb = $this->getDefaultQueryBuilder();
        $qb->join('p.token', 't');
        $qb->where($qb->expr()->eq('p.language', ':language'));
        $qb->andWhere($qb->expr()->eq('t.domain', ':domain'));

        $qb->setParameter('language', $language);
        $qb->setParameter('domain', $domain);

        return $qb->getQuery()->getResult();
    }
} 