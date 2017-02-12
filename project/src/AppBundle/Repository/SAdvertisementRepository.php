<?php

namespace AppBundle\Repository;

/**
 * SAdvertisementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SAdvertisementRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByPhones(array $phones)
    {
        return $this->createQueryBuilder('a')
            ->select('a.id, a.comment, a.url')
            ->innerJoin('a.phoneLink', 'phoneLink')
            ->innerJoin('phoneLink.phone', 'phone')
            ->where('phone.phone IN (:phones)')
            ->setParameter('phones', $phones)
            ->setMaxResults(10)
            ->orderBy('a.id', 'DESC')
            ->getQuery()
            ->getArrayResult();
    }

    public function findByUrl($url)
    {
        return $this->createQueryBuilder('a')
            ->select('a.id, a.comment, a.url')
            ->where('a.url = :url')
            ->setParameter('url', $url)
            ->setMaxResults(10)
            ->orderBy('a.id', 'DESC')
            ->getQuery()
            ->getArrayResult();
    }
}