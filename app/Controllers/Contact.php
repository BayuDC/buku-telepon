<?php

namespace App\Controllers;

use App\Models\ContactModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class Contact extends BaseController {
	protected $helpers = ['contact', 'form'];
	private $contactModel;
	public function __construct() {
		$this->contactModel = new ContactModel();
	}
	public function index() {
		return view('home', [
			'title' => 'Buku Telepon',
			'contacts' => $this->contactModel->getContact(),
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
			'from' => session()->getFlashData('from'),
		]);
	}
	public function add() {
		return view('add', [
			'title' => 'Tambah Kontak',
			'validation' => Services::validation(),
		]);
	}
	public function edit($id) {
		$contact = $this->contactModel->getContact($id);
		return view('edit', [
			'title' => 'Edit Kontak',
			'contact' => $contact,
			'validation' => Services::validation(),
		]);
	}
	public function save() {
		if (!validator($this->request->getPost(), 'contact_new')) {
			return redirect()->back()->withInput();
		}

		$contact = clear($this->request->getPost());
		$success = $this->contactModel->save([
			'name' => $contact['name'],
			'phone' => removeSpace($contact['phone']),
			'email' => emptyValue($contact['email']),
			'address' => emptyValue($contact['address'])
		]);

		if (!$success) {
			return redirect()->back()->withInput()->with('alert', getAlert('Kontak gagal ditambahkan', true));
		}
		$id = $this->contactModel->getLastId();
		return redirect()->to('/contact/' . $id)->with('alert', getAlert('Kontak berhasil ditambahkan'))->with('from', '/new');
	}
	public function update($id) {
		if (!validator($this->request->getPost(), 'contact_update')) {
			return redirect()->back()->withInput();
		}

		$contact = clear($this->request->getPost());
		$success = $this->contactModel->save([
			'id' => $id,
			'name' => $contact['name'],
			'phone' => removeSpace($contact['phone']),
			'email' => emptyValue($contact['email']),
			'address' => emptyValue($contact['address'])
		]);

		if (!$success) {
			return redirect()->back()->withInput()->with('alert', getAlert('Kontak gagal diperbarui', true));
		}
		return redirect()->to('/contact/' . $id)->with('alert', getAlert('Kontak berhasil diperbarui'));
	}
	public function delete() {
		$id = $this->request->getPost('id');
		$this->contactModel->delete($id);

		if ($this->contactModel->db->affectedRows() < 1) {
			return redirect()->to('/')->with('alert', getAlert('Kontak gagal dihapus', true));
		}
		return redirect()->to('/')->with('alert', getAlert('Kontak berhasil dihapus'));
	}
}
