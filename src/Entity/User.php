<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="USER")
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="userID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="userName", type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Password", type="string", length=255, nullable=true)
     */
    private $password;

    



	/**
	 * 
	 * @return int
	 */
	public function getUserid() {
		return $this->userid;
	}
	
	/**
	 * 
	 * @param int $userid 
	 * @return self
	 */
	public function setUserid($userid): self {
		$this->userid = $userid;
		return $this;
	}
	
	/**
	 * 
	 * @return string|null
	 */
	public function getUsername() {
		return $this->username;
	}
	
	/**
	 * 
	 * @param string|null $username 
	 * @return self
	 */
	public function setUsername($username): self {
		$this->username = $username;
		return $this;
	}
	
	/**
	 * 
	 * @return string|null
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * 
	 * @param string|null $email 
	 * @return self
	 */
	public function setEmail($email): self {
		$this->email = $email;
		return $this;
	}
	
	/**
	 * 
	 * @return string|null
	 */
	public function getPassword() {
		return $this->password;
	}
	
	/**
	 * 
	 * @param string|null $password 
	 * @return self
	 */
	public function setPassword($password): self {
		$this->password = $password;
		return $this;
	}

    public function __toString()
    {
        return "User ID : ".strval($this->userid)." ".$this->username;
    }
}
