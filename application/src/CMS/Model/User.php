<?php

namespace CMS\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="CMS\Model\UserRepository")
 * @Table(name="nerd_users")
 */
class User
{
    // Constants
    const STATUS_DEFAULT  = 'inactive';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_ACTIVE   = 'active';
    const STATUS_BANNED   = 'banned';

    const LEVEL_SUPER  = 'super';
    const LEVEL_ADMIN  = 'admin';
    const LEVEL_USER   = 'user';
    const LEVEL_GUEST  = 'guest';
    const LEVEL_BANNED = 'banned';

    /**
     * @Id
     * @Column(type="integer", scale=5, nullable=false)
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $super = false;

    /**
     * @Column(type="string", length=32, nullable=false)
     */
    private $username;

    /**
     * @Column(type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @Column(type="string", length=81, nullable=false)
     */
    private $password;

    /**
     * @Column(name="salt", type="string", length=81, nullable=true)
     */
    private $salt;

    /**
     * @Column(name="temp_password", type="string", length=81, nullable=true)
     */
    private $tempPassword;

    /**
     * @Column(type="string", length=81, nullable=true)
     */
    private $remember;

    /**
     * @Column(name="activation_hash", type="string", length=81, nullable=true)
     */
    private $activationHash;

    /**
     * @Column(type="string", length=45, nullable=false)
     */
    private $ip;

    /**
     * @Column(name="last_login", type="datetime", nullable=false)
     */
    private $lastLogin;

    /**
     * @Column(type="string", length=16, nullable=false)
     */
    private $status = self::STATUS_DEFAULT;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $activated = false;

    /**
     * @Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @OneToOne(targetEntity="CMS\Model\User\Metadata")
     * @JoinColumn(name="id", referencedColumnName="user_id")
     */
    private $metadata;

    /**
     * @ManyToMany(targetEntity="Role", inversedBy="users")
     * @JoinTable(name="nerd_users_roles")
     */
    private $roles;

    private $permissionsCache;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
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

    public function isSuper()
    {
        return (bool) $this->super;
    }

    public function setSuper($super = true)
    {
        if (!is_bool($super)) {
            throw new \InvalidArgumentException('Super must be a boolean value');
        }

        $this->super = $super;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Email is not a valid email value');
        }

        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    public function getTempPassword()
    {
        return $this->tempPassword;
    }

    public function setTempPassword($tempPassword)
    {
        $this->tempPassword = $tempPassword;
    }

    public function getRemember()
    {
        return $this->remember;
    }

    public function setRemember($remember)
    {
        $this->remember = $remember;
    }

    public function getActivationHash()
    {
        return $this->activationHash;
    }

    public function setActivationHash($activationHash)
    {
        $this->activationHash = $activationHash;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setIp($ip)
    {
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            throw new \InvalidArgumentException('IP is invalid');
        }

        $this->ip = $ip;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getStatuses()
    {
        return [
            self::STATUS_DEFAULT,
            self::STATUS_INACTIVE,
            self::STATUS_ACTIVE,
            self::STATUS_BANNED,
        ];
    }

    public function setStatus($status)
    {
        if (!in_array($status, $this->getStatuses())) {
            throw new \InvalidArgumentException('Invalid status');
        }

        $this->status = $status;
    }

    public function isActivated()
    {
        return (bool) $this->activated;
    }

    public function setActive()
    {
        $this->activated = true;
    }

    public function setInactive()
    {
        $this->activated = false;
    }

    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    // Validate datetime
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

    public function isBanned()
    {
        return $this->getStatus() === self::STATUS_BANNED;
    }

    /**
     * Metadata association
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Role association
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Permission association by proxy
     */
    public function getPermissions()
    {
        $permissions = new ArrayCollection();
        foreach ($this->getRoles() as $role) {
            foreach ($role->getPermissions() as $perm) {
                $permissions->add($perm);
            }
        }

        return $permissions;
    }

    public function hasPermission($permission)
    {
        foreach ($this->getRoles() as $role) {
            if ($role->hasPermission($permission)) return true;
        }

        return false;
    }
}
