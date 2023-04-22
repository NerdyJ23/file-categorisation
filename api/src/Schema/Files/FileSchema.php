<?php
namespace App\Schema\Files;
use App\Schema\SchemaInterface;

class FileSchema implements SchemaInterface {
	static function toSummarizedSchema($file): mixed {
		return [
			'id' => $file->id,
			'name' => $file->filename,
		];
	}

	static function toExtendedSchema($file): array {
		return FileSchema::toSummarizedSchema($file);
	}
}

