<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmployeeTwo
 *
 * @ORM\Table(name="arnie_emp")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeTwoRepository")
 */
class ArnieEmp
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="firtsName", type="string", length=255)
     */
    private $firtsName;

    /**
     * @var string
     *
     * @ORM\Column(name="middleName", type="string", length=255)
     */
    private $middleName;

    /**
     * @var string
     *
     * @ORM\Column(name="birthDate", type="string", length=255)
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="telNumber", type="string", length=255)
     */
    private $telNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="dateEmployed", type="string", length=255)
     */
    private $dateEmployed;

    /**
     * @var string
     *
     * @ORM\Column(name="salary", type="string", length=255)
     */
    private $salary;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return EmployeeTwo
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firtsName
     *
     * @param string $firtsName
     * @return EmployeeTwo
     */
    public function setFirtsName($firtsName)
    {
        $this->firtsName = $firtsName;

        return $this;
    }

    /**
     * Get firtsName
     *
     * @return string 
     */
    public function getFirtsName()
    {
        return $this->firtsName;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     * @return EmployeeTwo
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set birthDate
     *
     * @param string $birthDate
     * @return EmployeeTwo
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return string 
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return EmployeeTwo
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set telNumber
     *
     * @param string $telNumber
     * @return EmployeeTwo
     */
    public function setTelNumber($telNumber)
    {
        $this->telNumber = $telNumber;

        return $this;
    }

    /**
     * Get telNumber
     *
     * @return string 
     */
    public function getTelNumber()
    {
        return $this->telNumber;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return EmployeeTwo
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set dateEmployed
     *
     * @param string $dateEmployed
     * @return EmployeeTwo
     */
    public function setDateEmployed($dateEmployed)
    {
        $this->dateEmployed = $dateEmployed;

        return $this;
    }

    /**
     * Get dateEmployed
     *
     * @return string 
     */
    public function getDateEmployed()
    {
        return $this->dateEmployed;
    }

    /**
     * Set salary
     *
     * @param string $salary
     * @return EmployeeTwo
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get salary
     *
     * @return string 
     */
    public function getSalary()
    {
        return $this->salary;
    }
}
