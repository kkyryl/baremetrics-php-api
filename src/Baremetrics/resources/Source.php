<?php
namespace Baremetrics\Resources;

class Source extends BaseResource {
	const PATH = 'sources';

	public function retrieve () {
		return $this->client->httpGet(Source::PATH);
	}
}
