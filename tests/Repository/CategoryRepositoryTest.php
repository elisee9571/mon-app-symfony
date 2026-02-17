<?php

namespace App\Tests\Repository;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CategoryRepositoryTest extends KernelTestCase
{
    public function testFindAll(): void
    {
        self::bootKernel();
        $container = self::getContainer();

        $categories = $container->get(CategoryRepository::class)->findAll();
        $this->assertEquals(6, count($categories));
    }

    public function testFindOneByTitle(): void
    {
        self::bootKernel();
        $container = self::getContainer();

        $category[] = $container->get(CategoryRepository::class)->findOneBy(['title' => 'Chaussure']);
        $this->assertEquals(1, count($category));
    }
}
