<?php

namespace App\DataFixtures;
use App\Entity\User;
use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
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
        $faker = Faker\Factory::create('fr_FR');
        for($i=0; $i<4; $i++){
            $profil = new Profil();
            $profil->setLibelle($faker->unique()->randomElement(['ADMIN','FORMATEUR','CM','APPRENANT']));
=======
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create('fr_FR');
        for($i=0; $i<4; $i++){
            $profil = new Profil();
            $profil->setLibelle($faker->unique()->randomElement(['ADMIN','Formateur','CM','Apprenant']));
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
            $manager->persist($profil);
            $user = new User();
            $harsh = $this->encoder->encodePassword($user, 'sonatel');
            $user->setProfil($profil);
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
}
