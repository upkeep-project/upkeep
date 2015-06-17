<?php

namespace Upkeep\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Admin extends User
{

    /**
     * @ORM\OneToMany(targetEntity="Upkeep\AppBundle\Entity\Reseller", mappedBy="owner")
     */
    private $resellers;

    public function __construct()
    {
        $this->resellers = new ArrayCollection();
    }


    /**
     * @return ArrayCollection
     */
    public function getResellers()
    {
        return $this->resellers;
    }

    /**
     * @param ArrayCollection $resellers
     */
    public function setResellers(ArrayCollection $resellers)
    {
        $this->resellers = $resellers;
    }

    /**
     * @param Reseller $reseller
     */
    public function addReseller(Reseller $reseller)
    {
        $this->resellers->add($reseller);
    }

    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }

}