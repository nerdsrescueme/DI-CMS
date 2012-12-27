<?php

namespace CMS\Model;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getSuperUsers()
    {
        return $this->_em->createQuery('SELECT u FROM CMS\Model\User u WHERE u.super = 1')
                         ->getResult();
    }

    public function getBannedUsers()
    {
        return $this->_em->createQuery('SELECT u FROM CMS\Model\User u WHERE u.status = \'banned\'')
                         ->getResult();
    }

    public function getInactiveUsers()
    {
        return $this->_em->createQuery('SELECT u FROM CMS\Model\User u WHERE u.activated = 0')
                         ->getResult();
    }
}
