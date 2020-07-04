<?php

namespace App\Domain\Services;

use Valitron\Validator;
use App\Domain\Models\Contact;
use App\Domain\Repositories\Contracts\ContactInterface;

class ContactStoreService
{

	/**
	 * @var ContactInterface
	 */
	protected $contact;

	/**
	 * @var Validator
	 */
	protected $validator;


	public function __construct(ContactInterface $contact, Validator $validator)
	{
		$this->contact = $contact;
		$this->validator = $validator;
	}

	/**
	 * You can handle events here, and manipulate the data as needed.
	 * @param array $body
	 * @return array
	 */
	public function handle(array $body)
	{

		$validator = $this->validator->withData($body);

		$validator->mapFieldsRules(
			$this->rules()
		);

		if (!$validator->validate()) {

			return [
				'errors' => $validator->errors()
			];
		}

		return $this->contact->send($body);
	}


	protected function rules()
	{
		return [
			'email' => ['required', 'email'],
			'name' => 'required',
			'body' => 'required'
		];
	}
}
