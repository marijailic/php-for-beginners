<?php

namespace tests\Feature;

use tests\TestCase;
use Core\Database;
use Http\Repositories\UsersRepository;


class LoginTest extends TestCase
{
    public function testLoginPageShouldShowLoginForm(): void
    {
        $response = $this->get('/login');

        self::assertTrue($response->isOk());
        self::assertStringContainsString('<title>Login</title>', $response->body);
    }

    public function testUserShouldLoginWithRightCredentials(): void
    {
        $config = require __DIR__ . '/../../config.php';
        $db = new Database($config['database'], $config['credentials']['username'], $config['credentials']['password']);

        // create new user in db
        $userRepository = new UsersRepository($db);

        $userRepository->create(['email' => 'test@test.com', 'password' => 'password']);

        $user = $userRepository->getByEmail('test@test.com');

        $output = $this->post('/session', ['email' => 'test@test.com', 'password' => 'password']);

        self::assertTrue($output->isRedirect());
    }
}