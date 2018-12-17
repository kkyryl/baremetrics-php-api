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
}
