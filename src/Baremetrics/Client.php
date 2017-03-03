<?php
namespace Baremetrics;
require_once(__DIR__ . '/resources/Source.php');

class Client {
	const LIVE_API_URL = 'https://api.baremetrics.com';
	const SANDBOX_API_URL = 'https://api-sandbox.baremetrics.com';

	private $apiKey;

	public function __construct ($apiKey, $live = false) {
		$this->apiKey = $apiKey;
		$this->httpClient = new \GuzzleHttp\Client([
			'base_uri' => $live ? Client::LIVE_API_URL : Client::SANDBOX_API_URL,
		]);
	}

	public function __call ($name, $args) {
		preg_match('/^(?P<method>[a-z]+)(?P<resource>[A-Z].+)$/', $name, $matches);

		if (empty($matches)) {
			throw new Exception('Unsupported API call');
		}

		$resourceName = $this->normalizeResourceName($matches['resource']);
		$ResourceClass = '\\Baremetrics\\' . $resourceName;
		$resource = new $ResourceClass($this);

		switch ($matches['method']) {
			case 'list':
				return $resource->retrieve();
				break;
			default:
				throw new Exception('Unsupported API method.');
		}
	}

	public function httpGet ($path) {
		$response = $this->httpClient->get("/v1/{$path}", [
			'headers' => [
				'Authorization' => 'Bearer ' . $this->apiKey,
			],
		]);
		return json_decode((string)$response->getBody());
	}

	private function normalizeResourceName ($name) {
		return preg_replace('/s$/', '', $name);
	}
}
