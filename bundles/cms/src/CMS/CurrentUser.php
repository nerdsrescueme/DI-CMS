<?php

namespace CMS;

class CurrentUser
{
    private $em;
    private $user;
    private $validated = false;

    public function __construct($em, $session = null)
    {
        $this->em = $em;
		$this->session = $session;
    }

    public function getUser()
    {
    	if ($this->user === null) {
    		throw new \RuntimeException('No current user is authenticated');
    	}

        return $this->user;
    }

	public function check()
	{
		// If already validated pass
		if ($this->validated) {
			return true;
		}

		// If session is available attempt login and return result
		if ($this->session->get('auth.valid')) {
			return $this->loginWithSession();
		}

		// Otherwise fail
		return false;
	}

	public function loginWithSession()
	{
		$id   = (int) $this->session->get('auth.id');
		$salt = $this->session->get('auth.hash');

		return $this->login($id, $salt, false);
	}

    public function login($identifier, $secret, $buildHash = true)
    {
        $field = $this->_identifier($identifier);
        $query = $this->em->createQueryBuilder()
               ->select('u')
               ->from('\\CMS\\Model\\User', 'u')
               ->where("u.$field = :identifier")
               ->setParameter('identifier', $identifier)
               ->setMaxResults(1)
               ->getQuery();

        $user = $query->getSingleResult();

		if (count($user)) {
			if ($buildHash) {
				// Compare password hashes
				$secret = $this->_hash($secret, $user->getSalt())[0];
				$hash   = $user->getPassword();
			} else {
				// Compare salts
				$hash = $user->getSalt();
			}

			if ($secret === $hash) {
				$this->user = $user;
       			$this->validated = true;

				if ($this->session !== null) {
	        		$this->session->set('auth.hash', $user->getSalt());
					$this->session->set('auth.id', $user->getId());
					$this->session->set('auth.valid', true);
				}

				return true;
		}

        return false;
    }

	public function logout()
	{
		unset($this->user);
		$this->validated = false;

		if ($this->session !== null) {
			$this->session->remove('auth.hash');
			$this->session->remove('auth.valid');
			$this->session->remove('auth.id');
		}
	}

	private function _hash($secret, $salt = null)
	{
		$salt = $salt ?: md5(uniqid(rand(), true));

		return [hash('sha256', $salt.$secret), $salt];
	}

    private function _identifier($identifier)
    {
    	if (is_string($identifier)) {
	        return strpos($identifier, '@') !== false ? 'email' : 'username';
		}

		return 'id';
    }
}