<?php
namespace Baremetrics\Resources;

class Charge extends BaseResource {
	const PATH = '{}/charges';

	public function create ($sourceId, $chargeData) {
		return $this->client->httpPost(
			$this->getResourcePath($sourceId), $chargeData
		);
	}

	public function retrieve ($sourceId) {
		return $this->client->httpGet($this->getResourcePath($sourceId));
	}

	public function show ($sourceId, $chargeId) {
		return $this->client->httpGet(
			$this->getResourcePath($sourceId, $chargeId)
		);
	}
}
