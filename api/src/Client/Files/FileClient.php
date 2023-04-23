<?php

namespace App\Client\Files;

use App\Client\AbstractClient;
use App\Client\Security\AuthClient;
use App\Controller\Component\Pagination;

class FileClient extends AbstractClient {
	const TABLE = "Files";
	static function getFileById(int $id) {

	}

	static function getFileByTag(int $id) {

	}

	static function list(string $token, Pagination $pagination, mixed $tags): object {
		$query = parent::fetchTable(FileClient::TABLE)->find("all");
		$query = $query->contain(['Tags']);
		if ($tags != null) {
			$query = $query->matching('Tags', function($q) use ($tags) {
				return $q->where(['Tags.name IN' => $tags]);
			});
		}
		return parent::toList($query, $pagination);
	}
}