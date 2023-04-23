<?php
namespace App\Schema\Files;
use App\Schema\SchemaInterface;
use App\Schema\AbstractSchema;

class FileSchema implements SchemaInterface {
	static function toSummarizedSchema($file): mixed {
		return [
			'id' => $file->id,
			'name' => $file->filename,
			'tags' => AbstractSchema::schema($file->tags, 'Tag')
		];
	}

	static function toExtendedSchema($file): array {
		return FileSchema::toSummarizedSchema($file);
	}
}

