<?php
namespace App\Schema;
use App\Schema\SchemaInterface;
use App\Schema\AbstractSchema;

class TagSchema implements SchemaInterface {
	static function toSummarizedSchema($tag): mixed {
		return $tag->name;
		return [
			// 'id' => $tag->id,
			'name' => $tag->name,
		];
	}

	static function toExtendedSchema($tag): mixed {
		return TagSchema::toSummarizedSchema($tag);
	}
}

