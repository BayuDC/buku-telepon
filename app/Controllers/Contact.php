<?php

namespace App\Controllers;

use App\Models\ContactModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class Contact extends BaseController {
	protected $helpers = ['contact'];
	private $contactModel;
	public function __construct() {
		$this->contactModel = new ContactModel();
	}
	public function index() {
		return view('home', [
			'title' => 'Buku Telepon',
			'contacts' => $this->contactModel->getContact(),
			'success' => session()->getFlashData('success'),
			'message' => session()->getFlashData('message')
		]);
	}
	public function detail($id) {
		$contact = $this->contactModel->getContact($id);
		if ($id == 0 || !$contact) {
			throw new PageNotFoundException('Kontak tidak ditemukan');
		}
		$contact['email'] = emptyText($contact['email']);
		$contact['address'] = emptyText($contact['address']);
		$contact['picture'] = $contact['picture'] == null ? 'default.jpg' : $contact['picture'];
		return view('detail', [
			'title' => 'Detail Kontak',
			'contact' => $contact,
			'message' => session()->getFlashData('message'),
			'from' => session()->getFlashData('from')
		]);
	}
	public function add() {
		return view('add', [
			'title' => 'Tambah Kontak',
			'validation' => Services::validation(),
			'message' => session()->getFlashData('message')
		]);
	}
	public function edit($id) {
		$contact = $this->contactModel->getContact($id);
		return view('edit', [
			'title' => 'Edit Kontak',
			'contact' => $contact,
			'validation' => Services::validation(),
			'message' => session()->getFlashData('message')
		]);
	}
	public function save() {
		if (!$this->valid('contact_new')) {
			return redirect()->back()->withInput();
		}

		$contact = $this->request->getPost();
		$success = $this->contactModel->save([
			'name' => $contact['name'],
			'phone' => clear($contact['phone']),
			'email' => emptyValue($contact['email']),
			'address' => emptyValue($contact['address']),
		]);

		if (!$success) {
			return redirect()->back()->withInput()->with('message', 'Kontak gagal ditambahkan');
		}
		$id = $this->contactModel->getLastId();
		return redirect()->to('/contact/' . $id)
			->with('message', 'Kontak berhasil ditambahkan')
			->with('from', '/new');
	}
	public function update($id) {
		if (!$this->valid('contact_update')) {
			return redirect()->back()->withInput();
		}

		$contact = $this->request->getPost();
		$success = $this->contactModel->save([
			'id' => $id,
			'name' => $contact['name'],
			'phone' => clear($contact['phone']),
			'email' => emptyValue($contact['email']),
			'address' => emptyValue($contact['address']),
		]);

		if (!$success) {
			return redirect()->back()->withInput()->with('message', 'Kontak gagal diperbarui');
		}
		return redirect()->to('/contact/' . $id)->with('message', 'Kontak berhasil diperbarui');
	}
	public function delete() {
		$id = $this->request->getPost('id');
		$this->contactModel->delete($id);

		$success = $this->contactModel->db->affectedRows() > 0;
		$message = 'Kontak berhasil dihapus';
		if (!$success) {
			$message = 'Kontak gagal dihapus';
		}
		return redirect()->to('/')
			->with('success', $success)
			->with('message', $message);
	}
	private function valid($rule) {
		return Services::validation()->run($this->request->getPost(), $rule);
	}
}
