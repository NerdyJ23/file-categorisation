<?php
namespace App\Controller;

use Cake\Controller\Controller;
use App\Controller\Component\Enum\StatusCodes;
use App\Controller\Component\Pagination;

use App\Client\Security\AuthClient;
use App\Client\Files\FileClient;

class FilesController extends ApiController {
	public function initialize(): void {
		parent::initialize();
	}

	public function list() {
		$req = $this->request;
		$token = $req->getCookie("token");
		$pagination = new Pagination($req);

		if ($token == null || !AuthClient::validToken($token)) {
			return $this->response(StatusCodes::ACCESS_DENIED);
		}

		$result = FileClient::list(token: $token, pagination: $pagination);
		$schema = parent::schema($result->list, "Files");
		$this->set("result", $schema);
		$this->set("page", $pagination->getPage());
		$this->set("limit", $pagination->getLimit());
		$this->set("total", $result->total);
	}

	public function create() {
		return $this->response(StatusCodes::ACCESS_DENIED);

		$pass = $this->request->getData('password');
		$username = $this->request->getData('username');
		$first_name = $this->request->getData('firstName');
		$last_name = $this->request->getData('lastName');

		$user = $this->fetchTable('Users')->newEntity([
			'first_name' => $first_name,
			'last_name' => $last_name,
			'username' => $username,
			'password' => (new EncryptionController)->hashPassword($pass),
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
}