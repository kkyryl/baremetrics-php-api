<?php
namespace Baremetrics\Resources;

class Attribute extends BaseResource {
	const PATH = 'attributes';

	public function set ($attributesData) {
		return $this->client->httpPost(
			$this->getResourcePath(), $attributesData
		);
	}
}
