<?php

declare(strict_types=1);

namespace App\Endpoint\Web;

use Exception;
use Spiral\Auth\AuthContextInterface;
use Spiral\Prototype\Traits\PrototypeTrait;
use Spiral\Router\Annotation\Route;

/**
 * Simple home page controller. It renders home page template and also provides
 * an example of exception page.
 */
final class HomeController
{
    /**
     * Read more about Prototyping:
     * @link https://spiral.dev/docs/basics-prototype/#installation
     */
    use PrototypeTrait;

    #[Route(route: '/', name: 'index')]
    public function index(AuthContextInterface $authContext): string
    {
        $actor = $authContext->getActor();

        if ($actor) {
            return 'Hello, ' . $actor->get('name');
        }

        return 'Not logged in';
    }

    /**
     * Example of exception page.
     */
    #[Route(route: '/exception', name: 'exception')]
    public function exception(): never
    {
        throw new Exception('This is a test exception.');
    }
}
