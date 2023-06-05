<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use App\Controllers\UserController;
use PHPUnit\Framework\TestCase;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

final class UserTest extends TestCase
{
    public function testFindAllUsers() {
        $users = new UserController();
        $result = $users->index();

        $this->assertCount(3, $result);
        $this->assertArrayHasKey('id', $result[0]);
        $this->assertArrayHasKey('name', $result[1]);
        $this->assertArrayHasKey('email', $result[2]);
    }

    public function testFindFirstUser()
    {
        $users = new UserController();
        $result = $users->getFirst(1);

        $this->assertEquals(1, $result['id']);
        $this->assertEquals('Diego Delgado', $result['name']);
        $this->assertEquals('diego.960705@gmail.com', $result['email']);
    }
}
