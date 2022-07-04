<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Project;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // Utilisation de faker
        $faker = Factory::create('fr_FR');

        $user = new User();

        $user->setEmail('user@test.com')
             ->setFirstname('Miriam')
             ->setLastname('Simonnet')
             ->setRoles(['ROLE_USER']);

        $password = $this->encoder->hashPassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        // Création de 2 catégories
        for ($i = 0; $i < 2; $i++) {
            $category = new Category();

            $category->setName($faker->words(3, true))
                    ->setSlug($faker->slug());
            
            $manager->persist($category);

            // Création de 2 projets pour chaque catégorie
            for ($j=0; $j < 2; $j++ ){
                $project = new Project();

                $project->setTitle($faker->words(3, true))
                        ->setDescription($faker->text())
                        ->setSlug($faker->slug())
                        ->setFile('projet-happy.jpg')
                        ->setCategory($category)
                        ->setUser($user)
                        ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'));
                        
                $manager->persist($project);
            }
        }

        $manager->flush();
    }
}
