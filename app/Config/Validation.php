<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use App\Validation\MyRules;

class Validation {
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
		MyRules::class
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $contact_new = [
		'name' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama tidak boleh kosong',
			]
		],
		'phone' => [
			'rules' => 'required|is_unique[contacts.phone]|valid_phone_number',
			'errors' => [
				'required' => 'Nomor telepon tidak boleh kosong',
				'is_unique' => 'Nomor telepon sudah terdaftar',
				'valid_phone_number' => 'Nomor telepon tidak valid'
			]
		],
		'email' => [
			'rules' => "permit_empty|is_unique[contacts.email]|valid_email",
			'errors' => [
				'is_unique' => 'Email sudah terdaftar',
				'valid_email' => 'Email tidak valid'
			]
		],
		'address' => [
			'rules' => 'permit_empty'
		],
		'picture' => [
			'rules' => 'is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png,image/gif]|max_size[picture,5120]',
			'errors' => [
				'is_image' => 'Foto harus berupa file gambar',
				'mime_in' => 'Foto harus berupa file gambar',
				'max_size' => 'Ukuran file terlalu besar',
			]
		]
	];
	public $contact_update = [
		'name' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama tidak boleh kosong',
			]
		],
		'phone' => [
			'rules' => 'required|is_unique[contacts.phone,id,{id}]|valid_phone_number',
			'errors' => [
				'required' => 'Nomor telepon tidak boleh kosong',
				'is_unique' => 'Nomor telepon sudah terdaftar',
				'valid_phone_number' => 'Nomor telepon tidak valid'
			]
		],
		'email' => [
			'rules' => "permit_empty|is_unique[contacts.email,id,{id}]|valid_email",
			'errors' => [
				'is_unique' => 'Email sudah terdaftar',
				'valid_email' => 'Email tidak valid'
			]
		],
		'address' => [
			'rules' => 'permit_empty'
		],
		'picture' => [
			'rules' => 'is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png,image/gif]|max_size[picture,5120]',
			'errors' => [
				'is_image' => 'Foto harus berupa file gambar',
				'mime_in' => 'Foto harus berupa file gambar',
				'max_size' => 'Ukuran file terlalu besar',
			]
		]
	];
}
