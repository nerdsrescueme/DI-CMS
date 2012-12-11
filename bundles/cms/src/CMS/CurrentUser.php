<?php

namespace CMS;

class CurrentUser
{
    private $em;
    private $user;

    public function __construct()
    {
        $arg = func_get_arg(0);

        if ($arg instanceof Model\User) {
            $this->inject($arg);
        } else {
            $this->em = $arg;
        }
    }

    public function getUser()
    {
        return $this->user;
    }

    public function login($identifier, $secret)
    {
        $field = $this->_identifier($identifier);
        $query = $this->em->createQueryBuilder()
               ->select('u')
               ->from('\\CMS\\Model\\User', 'u')
               ->where("u.$field = :identifier")
               ->andWhere("u.password = :password")
               ->setParameter('identifier', $identifier)
               ->setParameter('password', $secret)
               ->setMaxResults(1)
               ->getQuery();

        $user    = $query->getSingleResult();
        $success = (bool) count($user);

        $success and $this->inject($user);

        return $success;
    }

    public function getRoles()
    {
        return $this->user->getRoles();
    }

    public function getPermissions()
    {
        return $this->user->getPermissions();
    }

    public function hasPermission($permission)
    {
        return $this->user->hasPermission($permission);
    }

    public function inject(Model\User $user)
    {
        $this->user = $user;
    }

    private function _identifier($identifier)
    {
        return strpos($identifier, '@') !== false ? 'email' : 'username';
    }
}