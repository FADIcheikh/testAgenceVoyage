<?php

namespace tunigo\tripBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * offre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="tunigo\tripBundle\Entity\offreRepository")
 */
class offre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=255)
     */
    private $destination;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datealler", type="date")
     */
    private $datealler;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateretour", type="date")
     */
    private $dateretour;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="companie", type="string", length=255)
     */
    private $companie;


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
     * Set destination
     *
     * @param string $destination
     * @return offre
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string 
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set datealler
     *
     * @param \DateTime $datealler
     * @return offre
     */
    public function setDatealler($datealler)
    {
        $this->datealler = $datealler;

        return $this;
    }

    /**
     * Get datealler
     *
     * @return \DateTime 
     */
    public function getDatealler()
    {
        return $this->datealler;
    }

    /**
     * Set dateretour
     *
     * @param \DateTime $dateretour
     * @return offre
     */
    public function setDateretour($dateretour)
    {
        $this->dateretour = $dateretour;

        return $this;
    }

    /**
     * Get dateretour
     *
     * @return \DateTime 
     */
    public function getDateretour()
    {
        return $this->dateretour;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return offre
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set companie
     *
     * @param string $companie
     * @return offre
     */
    public function setCompanie($companie)
    {
        $this->companie = $companie;

        return $this;
    }

    /**
     * Get companie
     *
     * @return string 
     */
    public function getCompanie()
    {
        return $this->companie;
    }
    
        public function __toString()
{
    return $this->destination;
}
    
}
