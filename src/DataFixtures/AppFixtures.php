<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Account;
use App\Entity\Operation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('Penneflamme');
        $user->setLastname('Katty');
        $user->setBirthDate(new \DateTime('02/20/2002'));
        $user->setEmail('tunespas@lol.fr');
        $user->setAdress('2 notre');
        $user->setPostalCode('10101');
        $user->setCity('Galaxie');
        $manager->persist($user);

        $account = new Account();
        $account->setUser($user);
        $account->setAccountType('compte courant');
        $account->setAccountNumber('lol101lol');
        $account->setOpeningDate(new \DateTime('02/20/2020'));
        $account->setAccountAmount('1500');
        $manager->persist($account);

        $operation = new Operation();
        $operation->setAccount($account);
        $operation->setOperationLabel('Achat Leclerc');
        $operation->setOperationType('debit');
        $operation->setOperationAmount('100');
        $operation->setOperationDate(new \DateTime());
        $manager->persist($operation);

        $manager->flush();
    }
}
