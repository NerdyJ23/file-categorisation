<?php

namespace App\Client\Users;

use App\Client\AbstractClient;
use App\Client\Security\AuthClient;

class UserClient extends AbstractClient {
	static function getByToken($token) {
		if ($token == null) {
			return null;
		}

		$query = parent::fetchTable("Users")->find('all')
		->where(['token' => $token])
		->limit(1);

		$result = $query->all()->toArray();
		return sizeOf($result) == 0 ? null : $result[0];
	}

	static function login($username, $password) {
		if (AuthClient::validUser($username, $password)) {
			$user = parent::fetchTable("Users")->find('all')
			->where(['username' => $username])
			->first();

			if ($user == null) {
				return null;
			}

			$token = AuthClient::generateToken();
			parent::fetchTable("Users")->patchEntity($user, ['token' => $token]);
			$user->token = $token;
			$user->token_valid_until = $user->setTokenTimeLimit(7);
			$result = parent::fetchTable("Users")->saveOrFail($user);

			return $result == false ? null : $token;
		}
		return null;
	}
}