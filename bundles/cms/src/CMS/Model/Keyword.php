<?php

namespace CMS\Model;

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
}