<?php
namespace App\Model\Table;

use Cake\ORM\Table;
class FilesTable extends Table {
	public function initialize(array $config): void {

		$this->setTable('ref_files');
		$this->setPrimaryKey('id');
		$this->belongsToMany('Tags', [
			'joinTable' => 'link_tags',
			'bindingKey' => 'id',
			'foreignKey' => 'file_id'
		]);
	}
}

?>