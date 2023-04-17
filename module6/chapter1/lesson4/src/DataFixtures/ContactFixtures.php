<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i<100; $i++) {
            $contact = new Contact();

            $contact->setTitle('test');
            $contact->setDescription('test');
            $contact->setEmail('test@test.com');
            $contact->setProposedMeetingDate(new \DateTime());

            $manager->persist($contact);
            $manager->flush();
        }
    }
}
