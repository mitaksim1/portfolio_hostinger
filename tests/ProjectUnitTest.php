<?php

namespace App\Tests;

use App\Entity\User;
use App\Entity\Project;
use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class ProjectUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $project = new Project();
        $category = new Category();
        $user = new User();

        $project->setTitle('title')
             ->setDescription('description')
             ->setSlug('slug-slug')
             ->setFile('file')
             ->setUser($user)
             ->setCategory($category);

        
        $this->assertTrue($project->getTitle() === 'title');
        $this->assertTrue($project->getDescription() === 'description');
        $this->assertTrue($project->getSlug() === 'slug-slug');
        $this->assertTrue($project->getFile() === 'file');
        $this->assertTrue($project->getUser() === $user);
        $this->assertTrue($project->getCategory() === $category);
    }

    public function testIsFalse(): void
    {
        $project = new Project();
        $category = new Category();
        $user = new User();

        $project->setTitle('title')
             ->setDescription('description')
             ->setSlug('slug-slug')
             ->setFile('file')
             ->setUser($user)
             ->setCategory($category);
        
        $this->assertFalse($project->getTitle() === 'false');
        $this->assertFalse($project->getDescription() === 'false');
        $this->assertFalse($project->getSlug() === 'slug-false');
        $this->assertFalse($project->getFile() === 'false');
        $this->assertFalse($project->getUser() === new User());
        $this->assertFalse($project->getCategory() === new Category());
    }

    public function testIsEmpty(): void
    {
        $project = new Project();
        
        $this->assertEmpty($project->getTitle());
        $this->assertEmpty($project->getDescription());
        $this->assertEmpty($project->getSlug());
        $this->assertEmpty($project->getFile());
        $this->assertEmpty($project->getUser());
        $this->assertEmpty($project->getCategory());
    }
}
