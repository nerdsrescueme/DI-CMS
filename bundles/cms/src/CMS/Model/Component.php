<?php

namespace CMS\Model;

/**
 * @Entity
 * @Table(name="nerd_components")
 */
class Component
{
	/**
	 * @Id
	 * @Column(type="integer", scale=8, nullable=false)
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @Column(name="page_id", type="integer", scale=8, nullable=false)
	 */
	private $pageId;

		/**
		 * @ManyToOne(targetEntity="Page", inversedBy="components")
		 * @JoinColumn(name="page_id", referencedColumnName="id")
		 */
		private $page;

	/**
	 * @Column(name="`key`", type="string", length=32, nullable=false)
	 */
	private $key;

	/**
	 * @Column(type="text", nullable=false)
	 */
	private $data;


	public function getId()
	{
		return $this->id;
	}

	public function getPageId()
	{
		return $this->pageId;
	}

	public function setPageId($pageId)
	{
		$this->pageId = (int) $pageId;
	}

	public function getPage()
	{
		return $this->page;
	}

	public function setPage(Page $page)
	{
		$this->page = $page;
	}

	public function getKey()
	{
		return $this->key;
	}

	public function setKey($key)
	{
		$this->key = $key;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setData($data)
	{
		$this->data = $data;
	}
}