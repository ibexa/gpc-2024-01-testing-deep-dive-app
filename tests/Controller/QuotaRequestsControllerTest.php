<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class QuotaRequestsControllerTest extends WebTestCase
{
    public function testAdminAccessList(): void
    {
        $client = self::createClient();
        $client->followRedirects(false);
        $client->catchExceptions(false);

        $crawler = $client->request('GET', '/admin/login');
        $form = $crawler->filter('form[action="/admin/login_check"]');
        $form = $form->form([
            '_username' => 'admin',
            '_password' => 'publish',
        ]);
        $client->submit($form);
        self::assertResponseStatusCodeSame(302);
        self::assertResponseRedirects('http://localhost/admin/dashboard');

        $response = $client->request('GET', '/admin/quota-requests');
        self::assertResponseIsSuccessful();
    }
}
