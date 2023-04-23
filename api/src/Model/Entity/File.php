<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Client\Security\EncryptionClient;

class File extends Entity {
	protected $_hidden = ['id'];
	protected $_accessible = [
		'id' => true, //int
		'filename' => true 
	];

	protected function _getId() {
		return EncryptionClient::encrypt($this->_fields['id']);
	}
}
?>