<?php

namespace tunigo\tripBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * reservationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class reservationRepository extends EntityRepository
{
        public function findBynom($nomprenom) {
        
           $qb=$this->createQueryBuilder('l');
            $qb->where('l.nomprenom like :nomprenom ')     
                    ->setParameter('nomprenom', $nomprenom);
            return $qb->getQuery()->getResult();
        
    }
}
