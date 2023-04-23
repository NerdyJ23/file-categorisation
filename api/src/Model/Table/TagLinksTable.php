<?php
namespace App\Model\Table;

use Cake\ORM\Table;
class TagLinksTable extends Table {
	public function initialize(array $config): void {
		$this->setTable('link_tags');
		$this->setEntityClass('TagLink');
		$this->setPrimaryKey('id');
		$this->belongsToMany('File')
			->setBindingKey('file_id')
			->setForeignKey('id');
			
		$this->hasOne('Tags')
			->setBindingKey('tag_id')
			->setForeignKey('id');
	}
}

?>