<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Controller\Security\EncryptionController;

class User extends Entity {
	protected $_hidden = ['id'];
	protected $_virtual = ['full_name', 'encrypted_id'];
	protected $_accessible = [
		'id' => true, //int
		'username' => true, //varchar
		'password' => true, //varchar hashed
		'token' => true, //varchar nullable
		'tokenExpiryTimestamp' => true, //timestamp nullable
	];

	protected function _getEncryptedId() {
		return ((new EncryptionController)->encrypt($this->_fields['id']));
	}

	public function setTokenTimeLimit($days) {
        try {
            intval($days);
        } catch(Exception $e) {
            return date('c', 0);
        }

        $today = date('c');
        return date('c', strtotime($today . ' + ' . $days . 'days'));
    }
}
?>