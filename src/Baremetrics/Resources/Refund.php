<?php
namespace Baremetrics\Resources;

class Refund extends BaseResource {
	const PATH = '{}/refunds';

	public function retrieve ($sourceId) {
		return $this->client->httpGet($this->getResourcePath($sourceId));
	}

	public function show ($sourceId, $refundId) {
		return $this->client->httpGet(
			$this->getResourcePath($sourceId, $refundId)
		);
	}

	public function create ($sourceId, $refundData) {
		return $this->client->httpPost(
			$this->getResourcePath($sourceId), $refundData
		);
	}

	public function delete ($sourceId, $refundId) {
		return $this->client->httpDelete(
			$this->getResourcePath($sourceId, $refundId)
		);
	}

	public function create ($sourceId, $refundData) {
		return $this->client->httpPost(
			$this->getResourcePath($sourceId), $refundData
		);
	}

	public function delete ($sourceId, $refundId) {
		return $this->client->httpDelete(
			$this->getResourcePath($sourceId, $refundId)
		);
	}
}
