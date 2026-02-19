<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\User\InMemoryUser;

class ProductControllerTest extends WebTestCase
{
    public function testCreateProduct(): void
    {
        $client = self::createClient();
        $user = new InMemoryUser('admin', 'password', ['ROLE_ADMIN']);
        $client->loginUser($user);

        $crawler = $client->request('GET', '/admin/product/new');
        $buttonCrawlerNode = $crawler->selectButton('Save');

        $form = $buttonCrawlerNode->form();

        $form['product[title]'] = 'Jeans levis';
        $form['product[description]'] = 'Voici la description de mon produit.';
        $form['product[price]'] = 125.26;
        $form['product[category]']->select('Pantalon');

        $client->submit($form);

        $this->assertResponseRedirects('/admin/product');
    }
}
