<?php

namespace App\DataFixtures;
<<<<<<< HEAD
=======

use Faker;
>>>>>>> e27215435756dbc4cdd6dea62908b5cb8c82b04f
use App\Entity\User;
use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
<<<<<<< HEAD
use Faker;
=======
>>>>>>> e27215435756dbc4cdd6dea62908b5cb8c82b04f
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
<<<<<<< HEAD
<<<<<<< HEAD
        $faker = Faker\Factory::create('fr_FR');
        for($i=0; $i<4; $i++){
            $profil = new Profil();
            $profil->setLibelle($faker->unique()->randomElement(['ADMIN','FORMATEUR','CM','APPRENANT']));
=======
        // $product = new Product();
        // $manager->persist($product);
=======
>>>>>>> e27215435756dbc4cdd6dea62908b5cb8c82b04f
        $faker = Faker\Factory::create('fr_FR');
        for($i=0; $i<=3; $i++){
            $profil = new Profil();
<<<<<<< HEAD
            $profil->setLibelle($faker->unique()->randomElement(['ADMIN','Formateur','CM','Apprenant']));
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
=======
            $profil->setLibelle($faker->unique()->randomElement(['Admin','Formateur','CM','Apprenant']));
>>>>>>> e27215435756dbc4cdd6dea62908b5cb8c82b04f
            $manager->persist($profil);
            $user = new User();
            $harsh = $this->encoder->encodePassword($user, 'sonatel');
            $user->setProfil($profil);
<<<<<<< HEAD
            $user->setUsername($faker->unique()->randomElement(['babacar','aminata','Oumar','Laye']));
<<<<<<< HEAD
            $user->setPassword($faker->randomElement([ $harsh, $harsh, $harsh,$harsh]));
            $user->setPrenom($faker->randomElement(['babacar','aminata','Oumar','Laye']));
            $user->setNom($faker->randomElement(['Diouf','Lo','Enne','Sall']));
            $user->setEmail($faker->randomElement(['babacar@sa.sn','aminata@sa.sn','Oumar@sa.sn','laye@sa.sn']));
            $user->setTel($faker->randomElement(['778458574','778548596','774859652','7777777777']));
            $user->setAvatar('avatar');
=======
            $user->setPassword($faker->randomElement([ $harsh, $harsh, $harsh, $harsh]));
            $user->setPrenom($faker->randomElement(['babacar','aminata','Oumar','Laye']));
            $user->setNom($faker->randomElement(['Diouf','Lo','Enne', 'Sall']));
            $user->setEmail($faker->randomElement(['babacar@sa.sn','aminata@sa.sn','Oumar@sa.sn','laye@sa.sn']));
            $user->setTel($faker->randomElement(['778458574','778548596','774859652','777777777']));
            $user->setAvatar('avatar');
            $user->setRoles(['ROLE_USER']);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
            $manager->persist($user);
        }

        $manager->flush();
    }
<<<<<<< HEAD
=======
    
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
=======
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
>>>>>>> e27215435756dbc4cdd6dea62908b5cb8c82b04f
}
