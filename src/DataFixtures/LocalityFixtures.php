<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Locality;

class LocalityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $locality = [
            ['postal_code'=>'1000',"locality"=>'Bruxelles'],
            ['postal_code'=>'1020',"locality"=>'Laeken'],
            ['postal_code'=>'1030',"locality"=>'Schaerbeek'],
            ['postal_code'=>'1050',"locality"=>'Ixelles'],
            ['postal_code'=>'1170',"locality"=>'Watermael-Boitsfort'],
        ];
        
        foreach ($locality as $record) {
            $locality = new Locality();
            $locality->setPostalCode($record['postal_code']);
            $locality->setLocality($record['locality']);
            
            $manager->persist($locality);
        }

        $manager->flush();
    }
}
