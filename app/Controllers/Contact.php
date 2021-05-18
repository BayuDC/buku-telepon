<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController {
	private $contactModel;
	public function __construct() {
		$this->contactModel = new ContactModel();
	}
	public function index() {
		$contacts = $this->contactModel->findAll();
		return view('home', [
			'title' => 'Buku Telepon',
			'contacts' => $contacts
		]);
	}
	public function add() {
	}
}
