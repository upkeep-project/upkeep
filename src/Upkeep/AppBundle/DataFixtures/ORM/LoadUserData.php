<?php

namespace Upkeep\AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Upkeep\AppBundle\Entity\Admin;
use Upkeep\AppBundle\Entity\Client;
use Upkeep\AppBundle\Entity\Reseller;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{

    const DEFAULT_PASSWORD = '000000';

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $admin = $this->loadAdmin($manager);
        $reseller = $this->loadReseller($admin, $manager);

        $this->loadClient($reseller, $manager);


    }

    private function loadAdmin(ObjectManager $manager)
    {
        $admin = new Admin();
        $admin->setUsername('admin');
        $admin->setEmail('admin@upkeep');
        $admin->setActive(true);
        $admin->setCreatedAt(new \DateTime());

        $encoder = $this->container->get('security.encoder_factory')->getEncoder($admin);

        $admin->setPassword($encoder->encodePassword(self::DEFAULT_PASSWORD, $admin->getSalt()));

        $manager->persist($admin);
        $manager->flush();

        return $admin;
    }

    private function loadReseller(Admin $admin, ObjectManager $manager)
    {
        $reseller = new Reseller();
        $reseller->setUsername('reseller');
        $reseller->setEmail('reseller@upkeep');
        $reseller->setActive(true);
        $reseller->setCreatedAt(new \DateTime());
        $reseller->setOwner($admin);

        $encoder = $this->container->get('security.encoder_factory')->getEncoder($reseller);

        $reseller->setPassword($encoder->encodePassword(self::DEFAULT_PASSWORD, $reseller->getSalt()));

        $manager->persist($reseller);
        $manager->flush();

        return $reseller;
    }

    private function loadClient(Reseller $reseller, ObjectManager $manager)
    {
        $client = new Client();
        $client->setUsername('client');
        $client->setEmail('client@upkeep');
        $client->setActive(true);
        $client->setCreatedAt(new \DateTime());
        $client->setOwner($reseller);

        $encoder = $this->container->get('security.encoder_factory')->getEncoder($client);

        $client->setPassword($encoder->encodePassword(self::DEFAULT_PASSWORD, $client->getSalt()));

        $manager->persist($client);
        $manager->flush();

        return $client;
    }
}