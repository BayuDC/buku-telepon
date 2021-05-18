<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model {
	protected $table                = 'contacts';
	protected $primaryKey           = 'id';
	protected $useTimestamps        = true;
	public function getContact($id = 0) {
		if ($id == 0) {
			return $this->findAll();
		}
		return $this->find($id);
	}
}
