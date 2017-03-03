<?php
namespace Baremetrics;

class Source {
	const PATH = 'sources';

	private $client;

	public function __construct ($client) {
		$this->client = $client;
	}

	public function retrieve () {
		return $this->client->httpGet(Source::PATH);
	}
}
