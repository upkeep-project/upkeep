<?php

namespace Upkeep\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Reseller extends User
{

    /**
     * @ORM\ManyToOne(targetEntity="Upkeep\AppBundle\Entity\Admin", inversedBy="resellers")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id", nullable=false)
     */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity="Upkeep\AppBundle\Entity\Client", mappedBy="owner")
     */
    private $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }

    /**
     * @return Admin
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param Admin $owner
     */
    public function setOwner(Admin $owner)
    {
        $this->owner = $owner;
    }

    public function getRoles()
    {
        return array('ROLE_RESELLER');
    }
}