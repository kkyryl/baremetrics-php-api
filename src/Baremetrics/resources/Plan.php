<?php
namespace Baremetrics\Resources;

class Plan extends BaseResource {
	const PATH = '{}/plans';

	public function create ($sourceId, $planData) {
		return $this->client->httpPost(
			$this->getResourcePath($sourceId)
		);
	}

	public function delete ($sourceId, $planId) {
		return $this->client->httpDelete(
			$this->getResourcePath($sourceId, $planId)
		);
	}

	public function retrieve ($sourceId) {
		return $this->client->httpGet(
			$this->getResourcePath($sourceId)
		);
	}

	public function show ($sourceId, $planId) {
		return $this->client->httpGet(
			$this->getResourcePath($sourceId, $planId)
		);
	}

	public function update ($sourceId, $planId, $planData) {
		return $this->client->httpPut(
			$this->getResourcePath($sourceId, $planId), $planData
		);
	}
}
