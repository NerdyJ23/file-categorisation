<?php
namespace App\Controller;

use DateTime;
use Cake\Controller\Controller;
use Cake\Http\Cookie\Cookie;
use App\Client\Security\EncryptionClient;
use App\Client\Security\AuthClient;
use App\Controller\Component\Enum\StatusCodes;
use App\Client\Users\UserClient;

class UsersController extends ApiController {
	public function initialize(): void {
		parent::initialize();
	}

	public function list() {}

	public function create() {
		return $this->response(StatusCodes::ACCESS_DENIED);

		$pass = $this->request->getData('password');
		$username = $this->request->getData('username');

		$user = $this->fetchTable('Users')->newEntity([
			'username' => $username,
			'password' => EncryptionClient::hashPassword($pass),
		]);

		$result = $this->getTableLocator()->get('Users')->save($user);
		$this->set('result', $result);
	}

	public function get() {
		$token = $this->request->getCookie('token');
		$result = UserClient::getByToken($token);
		if ($result != null) {
			$this->set('user', $this->toExtendedSchema($result));
		} else {
			return $this->response(StatusCodes::ACCESS_DENIED);
		}
	}

	public function login() {
		$pass = $this->request->getData('password');
		$username = $this->request->getData('username');
		$token = UserClient::login($username, $pass);
		if ($token != null) {
			$cookie = Cookie::create(
				'token',
				$token,
				[
					'expires' => new DateTime('+ 7 days'),
					// 'domain' => 'budget.jessprogramming.com'
			]
		);
			$cookie = $cookie
				->withSameSite('None')
				->withSecure(true);
			$this->response = $this->response->withCookie($cookie);
			$this->response = $this->response->withStatus(200, 'Logged in successfully');
		} else {
			$this->response = $this->response->withStatus(403, 'Login failed. Check credentials are correct');
		}
	}

	public function validToken() {
		$req = $this->request;
		$token = $req->getCookie('token');
		$result = AuthClient::validToken($token);
		$this->set('validToken', $result);
	}
	private function toExtendedSchema($user) {
		return [
			'username' => $user->Username
		];
	}
}