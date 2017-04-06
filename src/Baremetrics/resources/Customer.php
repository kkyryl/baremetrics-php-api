<?php
namespace Baremetrics\Resources;

class Customer extends BaseResource {
	const PATH = '{}/customers';

	public function create ($sourceId, $customerData) {
		return $this->client->httpPost(
			$this->getResourcePath($sourceId), $customerData
		);
	}

	public function delete ($sourceId, $customerId) {
		return $this->client->httpDelete(
			$this->getResourcePath($sourceId, $customerId)
		);
	}

	public function retrieve ($sourceId) {
		return $this->client->httpGet(
			$this->getResourcePath($sourceId)
		);
	}

	public function show ($sourceId, $customerId) {
		return $this->client->httpGet(
			$this->getResourcePath($sourceId, $customerId)
		);
	}

	public function update ($sourceId, $customerId, $customerData) {
		return $this->client->httpPut(
			$this->getResourcePath($sourceId, $customerId), $customerData
		);
	}
}
