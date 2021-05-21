<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model {
	protected $table                = 'contacts';
	protected $primaryKey           = 'id';
	protected $useTimestamps        = true;
	protected $allowedFields 		= ['name', 'phone', 'email', 'address', 'picture'];
	public function getContact($id = 0) {
		if ($id == 0) {
			return $this->findAll();
		}
		return $this->find($id);
	}
	public function getLastId() {
		$id = $this->builder()->selectMax('id')->get()->getResultArray();
		return $id[0]['id'];
	}
}
