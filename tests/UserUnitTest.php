<?php

namespace App\Tests;

use App\Entity\User;
use App\Entity\Project;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();
        $project = new Project();

        $user->setFirstname('prenom')
             ->setLastname('nom')
             ->setEmail('email@email.com')
             ->setPassword('password')
             ->addProject($project)
             ->setProfile('text');
        
        $this->assertTrue($user->getFirstname() === 'prenom');
        $this->assertTrue($user->getLastname() === 'nom');
        $this->assertTrue($user->getEmail() === 'email@email.com');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertContains($project, $user->getProjects());
        $this->assertTrue($user->getProfile() === 'text');
    }

    public function testIsFalse(): void
    {
        $user = new User();
        $project = new Project();

        $user->setFirstname('prenom')
             ->setLastname('nom')
             ->setEmail('email@email.com')
             ->setPassword('password')
             ->addProject($project)
             ->setProfile('text');
        
        $this->assertFalse($user->getFirstname() === 'false');
        $this->assertFalse($user->getLastname() === 'false');
        $this->assertFalse($user->getEmail() === 'email@false.com');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertNotContains(new Project(), $user->getProjects());
        $this->assertFalse($user->getProfile() === 'false');
    }

    public function testIsEmpty(): void
    {
        $user = new User();
        
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getLastname());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getProjects());
        $this->assertEmpty($user->getProfile());
    }
}
