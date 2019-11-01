<?php

namespace App\DataFixtures;

use App\Entity\StoreBranchLocation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

/**
 * App fixture. Insert to DB dummy values with Faker library
 */
class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 200; $i++) {
            $manager->persist(
                (new StoreBranchLocation())
                    ->setName($faker->company)
                    ->setAddress($faker->address)
                    ->setNumberOfEmployees(mt_rand(10, 200))
            );
        }

        $manager->flush();
    }
}
