<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for($i=0; $i<=3; $i++){
            $profil = new Profil();
            $profil->setLibelle($faker->unique()->randomElement(['Admin','Formateur','CM','Apprenant']));
            $manager->persist($profil);
            $user = new User();
            $harsh = $this->encoder->encodePassword($user, 'sonatel');
            $user->setProfil($profil);
            $user->setUsername($faker->unique()->randomElement(['Fatima','Maimouna','Djiby','Aly']));
            $user->setPassword($faker->randomElement([$harsh,$harsh,$harsh,$harsh]));
            $user->setPrenom($faker->randomElement(['babacar','aminata','Oumar','tokosel']));
            $user->setNom($faker->randomElement(['Diouf','Lo','Anne','Sall']));
            $user->setEmail($faker->randomElement(['babacar@sa.sn','aminata@sa.sn','Oumar@sa.sn','tokosel@sa.sn']));
            $user->setTel($faker->randomElement(['778458574','778548596','774859652','774859652']));
            $user->setAvatar('avatar');
            $manager->persist($user);
        }
        $manager->flush();
    }
}
