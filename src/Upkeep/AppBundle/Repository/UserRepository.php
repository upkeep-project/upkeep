<?php

namespace Upkeep\AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class UserRepository
{

    /**
     * @var EntityRepository
     */
    private $userRepository;

    public function __construct(EntityRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findOneByUsername($username)
    {
        return $this->userRepository->findOneBy(array('username' => $username));
    }

}