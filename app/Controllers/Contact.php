<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController {
	private $contactModel;
	public function __construct() {
		$this->contactModel = new ContactModel();
	}
	public function index() {
		return view('home', [
			'title' => 'Buku Telepon',
			'contacts' => $this->contactModel->getContact()
		]);
	}
	public function add() {
	}
	public function detail($id) {
		return view('detail', [
			'title' => 'Detail Kontak',
			'contact' => $this->contactModel->getContact($id)
		]);
	}
}
