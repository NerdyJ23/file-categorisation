<?php

namespace App\Client\Files;

use App\Client\AbstractClient;
use App\Client\Security\AuthClient;

class FileClient extends AbstractClient {
	const TABLE = "Files";
	static function getFileById(int $id) {

	}

	static function getFileByTag(int $id) {

	}

	static function list(string $token, Pagination $pagination): object {
		$query = parent::fetchTable(FileClient::TABLE)->find("all");
		return parent::toList($query, $pagination);
	}
}