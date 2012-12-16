<?php

namespace CMS\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="nerd_keywords")
 */
class Keyword
{
    /**
	 * @Id
	 * @Column(type="integer", scale=11, nullable=false)
	 * @GeneratedValue
	 */
	private $id;

    /**
     * @Column(type="string", length=32, nullable=false, unique=true)
     */
    private $keyword;

    /**
     * @ManyToMany(targetEntity="Page", mappedBy="keywords")
     */
    private $pages;

    /**
     * @ManyToMany(targetEntity="Site", mappedBy="keywords")
     */
    private $sites;


    public function __construct()
    {
        $this->pages = new ArrayCollection();
        $this->sites = new ArrayCollection();
    }

    public function getKeyword()
    {
        return $this->keyword;
    }
}