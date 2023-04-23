<?php
namespace App\Schema;

class AbstractSchema {
	static $schemas = [
		'File' => 'App\Schema\Files\FileSchema',
		'Tag' => 'App\Schema\TagSchema'
	];

	static function schema(mixed $item, string $schema): mixed {
		$type = 'App\Model\Entity\\' . $schema;

		if (is_a($item, $type, true)) {
			return AbstractSchema::$schemas[$schema]::toExtendedSchema($item);
		} else if (is_array($item)) {
			$result = [];
			foreach ($item as $i) {
				if (is_a($i, $type, true)) {
					$result[] = AbstractSchema::$schemas[$schema]::toSummarizedSchema($i);
				}
			}
			return $result;
		}
		return null;
	}

	static function schemaWithoutEntity(mixed $item, string $schema): mixed {
		if (is_null($item)) {
			return null;
		}
		if (is_array($item)) {
			$result = [];
			foreach ($item as $i) {
				$result[] = AbstractSchema::$schemas[$schema]::toSummarizedSchema($i);
			}
			return $result;
		}
		return AbstractSchema::$schemas[$schema]::toExtendedSchema($item);
	}
}