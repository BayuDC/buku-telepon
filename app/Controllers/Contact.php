<?php

namespace App\Controllers;

use App\Models\ContactModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

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
	public function detail($id) {
		$contact = $this->contactModel->getContact($id);
		if ($id == 0 || !$contact) {
			throw new PageNotFoundException('Kontak tidak ditemukan');
		}
		$contact['email'] = $this->notSetInverse($contact['email']);
		$contact['address'] = $this->notSetInverse($contact['address']);
		return view('detail', [
			'title' => 'Detail Kontak',
			'contact' => $contact
		]);
	}
	public function add() {
		return view('add', [
			'title' => 'Tambah Kontak',
			'validation' => Services::validation()
		]);
	}
	public function save() {
		if (!$this->valid('contactAdd')) {
			return redirect()->back()->withInput();
		}

		$contact = $this->request->getPost();
		$success = $this->contactModel->save([
			'name' => $contact['name'],
			'phone' => $this->clear($contact['phone']),
			'email' => $this->notSet($contact['email']),
			'address' => $this->notSet($contact['address']),
			'picture' => 'default.jpg'
		]);

		if (!$success) {
			return redirect()->back()->withInput()->with('message', 'Kontak gagal ditambahkan');
		}
		$id = $this->contactModel->getLastId();
		return redirect()->to('/contact/' . $id)->with('message', 'Kontak berhasil ditambahkan');
	}
	private function valid($rule) {
		return Services::validation()->run($this->request->getPost(), $rule);
	}
	private function notSet($str) {
		return $str == '' ? null : $str;
	}
	private function notSetInverse($str) {
		return $str == null ? 'Belum diatur' : $str;
	}
	private function clear($str) {
		return preg_replace('/\s+/', '', $str);
	}
}
