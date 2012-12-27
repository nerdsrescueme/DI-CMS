<?php

namespace CMS\Model;

use Doctrine\ORM\EntityRepository;

class PageRepository extends EntityRepository
{
    public function getGlobal($name)
    {
        return $this->_em->createQuery('SELECT g FROM CMS\Model\GlobalRegion g WHERE g.key = '.$name)
                         ->getResult();
    }
}
