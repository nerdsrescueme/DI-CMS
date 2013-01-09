<?php

namespace CMS\Model;

use Doctrine\Common\Collections\ArrayCollection
  , Doctrine\ORM\Mapping AS ORM
  , Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(readOnly=true)
 * @ORM\Table(name="nerd_states")
 */
class State
{
    /**
	 * @ORM\Id
	 * @ORM\Column(type="string", length=2, nullable=false)
     * @Assert\Length(min=2, max=2)
     * @Assert\NotBlank
	 */
	private $code;

        /**
         * @ORM\OneToMany(targetEntity="City", mappedBy="stateObject")
         */
        private $cities;

    /**
     * @ORM\Column(type="string", length=32, nullable=false, unique=true)
     * @Assert\Length(min=4, max=32)
     * @Assert\NotBlank
     */
    private $name;


	public function __construct()
	{
		$this->cities = new ArrayCollection();
	}

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCities()
    {
        return $this->cities;
    }
}