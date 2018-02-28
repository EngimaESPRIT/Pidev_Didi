<?php
/**
 * Created by PhpStorm.
 * User: medme
 * Date: 20/02/2018
 * Time: 17:42
 */
namespace GestionMatchBundle\Repository;

class PronosticsRepository extends  \Doctrine\ORM\EntityRepository
{
    public function findArray()
    {
        $qb = $this->createQueryBuilder('u')
            ->Select('u')->orderBy('u.idProno' , 'DESC')
            ->setMaxResults(1);

        return $qb->getQuery()->getResult();
    }

}