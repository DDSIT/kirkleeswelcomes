<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="provider")
 * @ORM\Entity
 */
class Provider
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\Column(name="$phoneNumber", type="string", length=255)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(name="website", type="string", length=255)
     */
    private $website;

    /**
     * @ORM\Column(name="contactName", type="string", length=255)
     */
    private $contactName;

    /**
     * @ORM\Column(name="postcode", type="string", length=20)
     */
    private $postcode;

    /**
     * @ORM\Column(name="address", type="text")
     */
    private $address;

    function __construct($address, $contactName, $description, $email, $name, $phoneNumber, $postcode, $website)
    {
        $this->address = $address;
        $this->contactName = $contactName;
        $this->description = $description;
        $this->email = $email;
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->postcode = $postcode;
        $this->website = $website;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
    }

    public function getContactName()
    {
        return $this->contactName;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function setWebsite($website)
    {
        $this->website = $website;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function __toString()
    {
        return $this->name;
    }
}
