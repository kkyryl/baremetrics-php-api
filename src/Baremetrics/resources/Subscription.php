<?php
namespace Baremetrics\Resources;

class Subscription extends BaseResource {
	const PATH = '{}/subscriptions';

	public function create ($sourceId, $subscriptionData) {
		return $this->client->httpPost(
			$this->getResourcePath($sourceId), $subscriptionData
		);
	}

	public function delete ($sourceId, $subscriptionId) {
		return $this->client->httpDelete(
			$this->getResourcePath($sourceId, $subscriptionId)
		);
	}

	public function retrieve ($sourceId) {
		return $this->client->httpGet($this->getResourcePath($sourceId));
	}

	public function show ($sourceId, $subscriptionId) {
		return $this->client->httpGet(
			$this->getResourcePath($sourceId, $subscriptionId)
		);
	}

	public function update ($sourceId, $subscriptionId, $subscriptionData) {
		return $this->client->httpPut(
			$this->getResourcePath($sourceId, $subscriptionId), $subscriptionData
		);
	}
}
