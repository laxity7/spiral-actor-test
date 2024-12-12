<?php

declare(strict_types=1);

namespace Tests\Feature\Controller;

use App\Domain\User;
use Tests\TestCase;
use Spiral\Testing\Http\FakeHttp;

class HomeControllerTest extends TestCase
{
    private FakeHttp $http;

    protected function setUp(): void
    {
        parent::setUp();

        $this->http = $this->fakeHttp();
    }

    /**
     * @covers HomeController::index()
     */
    public function testDefaultActionWorks(): void
    {
        $user = new User('Test');
        $response = $this->http->withActor($user)->get('/')->assertOk();

        $this->assertEquals('Test', (string)$response->getOriginalResponse()->getBody());
    }
}
