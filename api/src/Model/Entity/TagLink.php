<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;
use App\Client\Security\EncryptionClient;

class TagLink extends Entity {
	protected $_hidden = ['id', 'tag_id', 'file_id'];
	protected $_accessible = [];

	protected function _getId() {
		return EncryptionClient::encrypt($this->_fields['id']);
	}
	protected function _getTagId() {
		return EncryptionClient::encrypt($this->_fields['tag_id']);
	}
	protected function _getFileId() {
		return EncryptionClient::encrypt($this->_fields['file_id']);
	}
}
?>