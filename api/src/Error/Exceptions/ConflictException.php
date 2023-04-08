<?php
namespace App\Error\Exceptions;
use Cake\Core\Exception\Exception;

class ConflictException extends Exception {
	protected $_messageTemplate = '%s already exists!';
	protected $_defaultCode = 422;
}