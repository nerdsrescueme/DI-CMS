<?php

namespace CMS\Model;

/**
 * @Entity
 * @Table(name="nerd_sessions")
 */
class Session
{
	/**
	 * @Id
	 * @Column(type="string", length=50, nullable=false)
	 */
	private $id;

	/**
	 * @Column(name="user_id", type="integer", scale=5, nullable=true)
	 */
	private $userId;

		/**
		 * @ManyToOne(targetEntity="User")
		 * @JoinColumn(name="user_id", referencedColumnName="id")
		 */
		 private $user;

	/**
	 * @Column(type="string", nullable=false)
	 */
	private $data;

	/**
	 * @Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @Column(name="updated_at", type="datetime", nullable=false)
	 */
	private $updatedAt;


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

	public function getUserId()
	{
		return $this->userId;
	}

	public function setUserId($userId)
	{
		if (!is_int($userId)) {
			throw new \InvalidArgumentException('User id must be an integer');
		}

		$this->id = $userId;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setData($data)
	{
		$this->data = $data;
	}

	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	public function setCreatedAt()
	{
		throw new \RuntimeException('Created at is automatically set by the database');
	}

	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}

	public function setUpdatedAt()
	{
		throw new \RuntimeException('Updated at is automatically set by the database');
	}


	/**
	 * User association
	 */
	public function getUser()
	{
		return $this->user;
	}
}