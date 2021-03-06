<?php

namespace AppBundle\Repository;

/**
 * PaymentsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReservationRepository extends \Doctrine\ORM\EntityRepository
{
    public function findReservation($id)
    {

        return $this ->createQueryBuilder('l')
            ->select('r')
            ->from('AppBundle:Reservation','r')
            ->where('r.enabled = :true')
            ->setParameter('true', 1)
            ->orderBy('r.created', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getFirstResult();
    }
    public function findReservationCheck($user,$donation)
    {

        return $this ->createQueryBuilder('l')
            ->select('r')
            ->from('AppBundle:Reservation','r')
            ->where('r.donation = :donation')
            ->andWhere('r.payer = :user')
            ->setParameter('donation', $donation)
            ->setParameter('user', $user)
            ->orderBy('r.created', 'DESC')
            ->getQuery()
            ->getResult();
    }
    public function findUserReservation($user)
    {

        return $this ->createQueryBuilder('l')
            ->select('r')
            ->from('AppBundle:Reservation','r')
            ->where('r.payer = :user')
            ->andWhere('r.enabled = :true')
            ->setParameter('user', $user)
            ->setParameter('true', 1)
            ->orderBy('r.created', 'DESC')
            ->getQuery()
            ->getResult();

    }

}
