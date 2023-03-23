<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ServiceTestCase extends WebTestCase
{
    protected ContainerInterface $mycontainer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mycontainer = static::createClient()->getContainer();
    }
}