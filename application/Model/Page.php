<?php

/**
 * +------------------+---------------------------+------+-----+---------------------+-----------------------------+
 * | Field            | Type                      | Null | Key | Default             | Extra                       |
 * +------------------+---------------------------+------+-----+---------------------+-----------------------------+
 * | id               | int(8) unsigned           | NO   | PRI | NULL                | auto_increment              |
 * | site_id          | int(2) unsigned           | NO   | MUL | NULL                |                             |
 * | layout_id        | char(32)                  | NO   |     | default             |                             |
 * | title            | char(160)                 | NO   |     | NULL                |                             |
 * | subtitle         | char(160)                 | YES  |     | NULL                |                             |
 * | uri              | char(200)                 | NO   | UNI | NULL                |                             |
 * | description      | char(200)                 | YES  |     | NULL                |                             |
 * | status           | enum('one','two')         | YES  |     | one                 |                             |
 * | priority         | int(2) unsigned zerofill  | NO   |     | 05                  |                             |
 * | change_frequency | enum('always'…)           | YES  |     | weekly              |                             |
 * | updated_at       | timestamp                 | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
 * | created_at       | timestamp                 | NO   |     | 0000-00-00 00:00:00 |                             |
 * +------------------+---------------------------+------+-----+---------------------+-----------------------------+
 *
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
		 * @ManyToOne(targetEntity="Site")
		 * @JoinColumn(name="site_id", referencedColumnName="id")
		 */
		 private $site;

	/**
	 * @Column(name="layout_id", type="string", length=32, nullable=false)
	 */
	private $layoutId = 'default';

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
	 * Site association
	 */
	public function getSite()
	{
		return $this->site;
	}

	/**
	 * Accomodate ENUM on changeFrequency column
	 */
	public function setChangeFrequency($frequency)
	{
		$possibilities = [
			self::FREQ_ALWAYS,
			self::FREQ_HOURLY,
			self::FREQ_DAILY,
			self::FREQ_WEEKLY,
			self::FREQ_MONTHLY,
			self::FREQ_YEARLY,
			self::FREQ_NEVER,
		];

		if (!in_array($frequency, $possibilities)) {
			throw new \InvalidArgumentException('Invalid change frequency');
		}

		$this->changeFrequency = $frequency;
	}
}