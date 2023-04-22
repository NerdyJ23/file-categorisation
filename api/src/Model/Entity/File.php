<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Controller\Security\EncryptionController;

class File extends Entity {
	protected $_hidden = ['id'];
	protected $_accessible = [
		'id' => true, //int
		'filename' => true 
	];

	protected function _getEncryptedId() {
		return ((new EncryptionController)->encrypt($this->_fields['id']));
	}
}
?>