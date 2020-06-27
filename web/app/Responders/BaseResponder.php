<?php

namespace App\Responders;

use Intervention\Image\ImageManager;
use Slim\Psr7\Factory\StreamFactory;

class BaseResponder
{

	protected $mime = '123';

	public function __construct(ImageManager $image)
	{
		$this->image = $image;
	}

	public function withJson($response, array $data, int $status = 200)
	{
		$response->getBody()->write(
			json_encode([
				'success' => ($status >= 400) ? false : true,
				'data' => $data
			])
		);

		return $response->withHeader(
			'Content-Type', 'application/json'
		)->withStatus($status);
	}

	public function withImage($response, array $data, int $status = 200)
	{

		$this->mime = $this->image->make(uploads_path($data['filename']))->mime;
		$resize = ($data['s'] ?? 1000);
		$file = $this->image->cache(function($builder) use ($data, $resize)	 {
			$builder
			->make(uploads_path($data['filename']))
			->resize($resize, null, function($constraint) {
				$constraint->aspectRatio();
			})->encode($file->extension);
		});

		$response->getBody()->write((string) $file);
		return $response->withHeader(
			'Content-Type', $this->mime
		)->withStatus($status);
	}

}