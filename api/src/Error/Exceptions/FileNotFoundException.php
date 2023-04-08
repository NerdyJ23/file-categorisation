<?php
namespace App\Error\Exceptions;
use Cake\Core\Exception\Exception;

class FileNotFoundException extends Exception {
	protected $_messageTemplate = '%s was not found.';
	protected $_defaultCode = 404;
}