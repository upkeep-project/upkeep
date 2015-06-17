<?php

namespace Upkeep\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Client extends User
{

    /**
     * @ORM\ManyToOne(targetEntity="Upkeep\AppBundle\Entity\Reseller", inversedBy="clients")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id", nullable=false)
     */
    private $owner;


    /**
     * @return Reseller
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param Reseller $owner
     */
    public function setOwner(Reseller $owner)
    {
        $this->owner = $owner;
    }

    public function getRoles()
    {
        return array('ROLE_CLIENT');
    }

}