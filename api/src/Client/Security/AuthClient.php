<?php
namespace App\Client\Security;

use App\Client\AbstractClient;
use App\Client\Security\EncryptionClient;
use App\Client\Users\UserClient;
use Cake\Http\Response;

class AuthClient extends AbstractClient {
	static function generateToken(): string {
		return bin2hex(random_bytes(16));
	}

	static function validToken($token): bool {
		if ($token == null) {
			return false;
		}
		$result = UserClient::getByToken($token);
		return $result != null;
	}

	static function validUser(string $username, string $password): bool {
		$passwordHash = EncryptionClient::hashPassword($password);
		$dbPass = parent::fetchTable('Users')->find('all')
			->where(['username' => $username])
			->first();
		if ($dbPass == null) {
			return false;
		}

		if ($passwordHash == $dbPass->password) {
			return true;
		}
		return false;
	}
}