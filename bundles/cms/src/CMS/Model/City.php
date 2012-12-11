<?php

namespace CMS\Model;

/**
 * @Entity
 * @Table(name="nerd_cities")
 */
class City
{
    /**
	 * @Id
	 * @Column(type="integer", scale=5, nullable=false)
	 */
	private $zip;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    private $city;

    /**
     * @Column(type="string", length=2, nullable=false)
     */
    private $state;

    /**
     * @ManyToOne(targetEntity="State", inversedBy="cities")
     * @JoinColumn(name="state", referencedColumnName="code")
     */
    private $stateObject;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    private $county;

    /**
     * @Column(type="float", nullable=false)
     */
    private $latitude;

    /**
     * @Column(type="float", nullable=false)
     */
    private $longitude;

    
    public function getZip()
    {
        return $this->zip;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getStateObject()
    {
        return $this->stateObject;
    }

    public function getCounty()
    {
        return $this->county;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getFullName()
    {
        return $this->getCity().', '.$this->getState();
    }

    public function getCoordinates()
    {
        return [$this->getLatitude(), $this->getLongitude()];
    }
}