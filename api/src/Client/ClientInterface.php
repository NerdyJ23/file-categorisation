<?php
namespace App\Client;

interface ClientInterface {
	static function canAccess(string $token, string $id): bool;
}