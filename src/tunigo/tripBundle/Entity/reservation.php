<?php

namespace tunigo\tripBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * reservation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="tunigo\tripBundle\Entity\reservationRepository")
 */
class reservation
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
     * @ORM\Column(name="nomprenom", type="string", length=255)
     */
    private $nomprenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbplaces", type="integer")
     */
    private $nbplaces;

    /**
     * @var string
     *
     * @ORM\Column(name="typedepayement", type="string", length=255)
     */
    private $typedepayement;
    
       /**
     * @ORM\ManyToOne(targetEntity="offre", cascade={"persist", "remove"})
     *
     * @ORM\JoinColumn(name="offre_id", referencedColumnName="id")
     */
    private $offre;


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
     * Set nomprenom
     *
     * @param string $nomprenom
     * @return reservation
     */
    public function setNomprenom($nomprenom)
    {
        $this->nomprenom = $nomprenom;

        return $this;
    }

    /**
     * Get nomprenom
     *
     * @return string 
     */
    public function getNomprenom()
    {
        return $this->nomprenom;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return reservation
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nbplaces
     *
     * @param integer $nbplaces
     * @return reservation
     */
    public function setNbplaces($nbplaces)
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }

    /**
     * Get nbplaces
     *
     * @return integer 
     */
    public function getNbplaces()
    {
        return $this->nbplaces;
    }

    /**
     * Set typedepayement
     *
     * @param string $typedepayement
     * @return reservation
     */
    public function setTypedepayement($typedepayement)
    {
        $this->typedepayement = $typedepayement;

        return $this;
    }

    /**
     * Get typedepayement
     *
     * @return string 
     */
    public function getTypedepayement()
    {
        return $this->typedepayement;
    }
    
       /**
     * Set offre
     *
     * @param integer $offre
     * @return reservation
     */
    public function setOffre($offre)
    {
        $this->offre = $offre;

        return $this;
    }

    /**
     * Get offre
     *
     * @return integer 
     */
    public function getOffre()
    {
        return $this->offre;
    }
}
