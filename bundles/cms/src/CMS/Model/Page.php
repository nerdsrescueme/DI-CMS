<?php

namespace CMS\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="nerd_pages")
 */
class Page
{
	// Change frequencies
	const FREQ_DEFAULT = 'weekly';
	const FREQ_ALWAYS  = 'always';
	const FREQ_HOURLY  = 'hourly';
	const FREQ_DAILY   = 'daily';
	const FREQ_WEEKLY  = 'weekly';
	const FREQ_MONTHLY = 'monthly';
	const FREQ_YEARLY  = 'yearly';
	const FREQ_NEVER   = 'never';

	/**
	 * @Id
	 * @Column(type="integer", scale=8, nullable=false)
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @Column(name="site_id", type="integer", scale=2, nullable=false)
	 */
	private $siteId;

		/**
		 * @ManyToOne(targetEntity="Site", inversedBy="pages")
		 * @JoinColumn(name="site_id", referencedColumnName="id")
		 */
		 private $site;

	/**
	 * @Column(type="string", length=32, nullable=false)
	 */
	private $layout = 'default';

	/**
	 * @Column(type="string", length=160, nullable=false)
	 */
	private $title;

	/**
	 * @Column(type="string", length=160, nullable=true)
	 */
	private $subtitle;

	/**
	 * @Column(type="string", length=200, nullable=false, unique=true)
	 */
	private $uri;

	/**
	 * @Column(type="string", length=200, nullable=true)
	 */
	private $description;

	/**
	 * @Column(type="string", length=16, nullable=true)
	 */
	private $status = 'one';

	/**
	 * @Column(type="integer", scale=2, nullable=false)
	 */
	private $priority = 5;

	/**
	 * @Column(name="change_frequency", type="string", length=16, nullable=true)
	 */
	private $changeFrequency = self::FREQ_DEFAULT;

	/**
	 * @Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @Column(name="updated_at", type="datetime", nullable=false)
	 */
	private $updatedAt;

    /**
     * @ManyToMany(targetEntity="Keyword", inversedBy="page")
     * @JoinTable(name="nerd_page_keywords")
     */
    private $keywords;

	/**
	 * @OneToMany(targetEntity="Component", mappedBy="page")
	 */
	private $components;

	/**
	 * @OneToMany(targetEntity="Region", mappedBy="page")
	 */
	private $regions;

	/**
	 * @OneToMany(targetEntity="Snippet", mappedBy="page")
	 */
	private $snippets;


    public function __construct()
    {
        $this->keywords = new ArrayCollection();
    }

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		if ($this->id !== null) {
			throw new \RuntimeException('Id cannot be reset');
		}

		if (!is_int($id)) {
			throw new \InvalidArgumentException('Id must be an integer');
		}

		$this->id = $id;
	}

	public function getSiteId()
	{
		return $this->siteId;
	}

	public function setSiteId($siteId)
	{
		if (!is_int($siteId)) {
			throw new \InvalidArgumentException('Id must be an integer');
		}

		$this->id = $siteId;
	}

	public function getLayout()
	{
		return $this->layout;
	}

	public function setLayout($layout)
	{
		$this->layout = $layout;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getSubtitle()
	{
		return $this->subtitle;
	}

	public function setSubtitle($subtitle)
	{
		$this->subtitle = $subtitle;
	}

	public function getUri()
	{
		return $this->uri;
	}

	public function setUri($uri)
	{
		$this->uri = trim($uri, '/');
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function setStatus($status)
	{
		// Need to use enum prediction
		$this->status = $status;
	}

	public function getChangeFrequency()
	{
		return $this->changeFrequency;
	}

    public function getChangeFrequencies()
    {
        return [
			self::FREQ_ALWAYS,
			self::FREQ_HOURLY,
			self::FREQ_DAILY,
			self::FREQ_WEEKLY,
			self::FREQ_MONTHLY,
			self::FREQ_YEARLY,
			self::FREQ_NEVER,
		];
    }

	public function setChangeFrequency($frequency)
	{
		if (!in_array($frequency, $this->getChangeFrequencies())) {
			throw new \InvalidArgumentException('Invalid change frequency');
		}

		$this->changeFrequency = $frequency;
	}

	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}

	/**
	 * Site association
	 */
	public function getSite()
	{
		return $this->site;
	}

    /**
     * Keyword association
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

	/**
	 * Component association
	 */
	public function getComponents()
	{
		return $this->components;
	}

	/**
	 * Region association
	 */
	public function getRegions()
	{
		return $this->regions;
	}

	/**
	 * Snippet association
	 */
	public function getSnippets()
	{
		return $this->snippets;
	}
}