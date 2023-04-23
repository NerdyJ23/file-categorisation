<?php
namespace App\Model\Table;

use Cake\ORM\Table;
class TagsTable extends Table {
	public function initialize(array $config): void {
		$this->setTable('ref_tags');
		$this->belongsToMany('Files', [
			'joinTable' => 'link_tags',
			'foreignKey' => 'id',
			'bindingKey' => 'file_id'
		]);
		$this->setEntityClass('Tag');
		
			// $this->belongsToMany('TagLinks')
		// 	->setForeignKey('tag_id')
		// 	->setPrimaryKey('id');
	}
}

?>