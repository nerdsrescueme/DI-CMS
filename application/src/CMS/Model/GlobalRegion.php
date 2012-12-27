<?php

namespace CMS\Model;

/**
 * @Entity
 * @Table(name="nerd_globals")
 */
class GlobalRegion
{
    /**
     * @Id
     * @Column(type="integer", scale=8, nullable=false)
     * @GeneratedValue
     */
    private $id;

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
