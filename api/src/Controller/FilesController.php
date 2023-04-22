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
}