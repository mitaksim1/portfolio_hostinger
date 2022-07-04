<?php

namespace App\Tests;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $category = new Category();

        $category->setName('name')
             ->setSlug('slug-slug');
        
        $this->assertTrue($category->getName() === 'name');
        $this->assertTrue($category->getSlug() === 'slug-slug');
    }

    public function testIsFalse(): void
    {
        $category = new Category();

        $category->setName('name')
             ->setSlug('slug-slug');
        
        $this->assertFalse($category->getName() === 'false');
        $this->assertFalse($category->getSlug() === 'false');
    }

    public function testIsEmpty(): void
    {
        $category = new Category();
        
        $this->assertEmpty($category->getName());
        $this->assertEmpty($category->getSlug());
    }
}
