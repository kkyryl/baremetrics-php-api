<?php
namespace Baremetrics\Resources;

abstract class BaseResource {
	protected $client;

	public function __construct ($client) {
		$this->client = $client;
	}

	/**
	 * Build path to API resource endpoint.
	 *
	 * For resources that are within a Baremetrics source, a source ID needs to
	 * be provided. In addition for a single resource the resource ID must be
	 * provided.
	 *
	 * @param string $sourceId
	 * @param string $resourceId
	 * @return string
	 */
	protected function getResourcePath ($sourceId = null, $resourceId = null) {
		$path = static::PATH;

		if ($sourceId) {
			$path = str_replace('{}', urlencode($sourceId), $path);
		}

		if ($resourceId) {
			$path .= '/' . urlencode($resourceId);
		}

		return $path;
	}

	/**
	 * Simple handler for `list` method since `list` is also a PHP operator
	 * and can't be used as a method name directly.
	 */
	public function __call ($name, $args) {
		if ($name === 'list') {
			return call_user_func_array([$this, 'retrieve'], $args);
		}

		return super::__call($name, $args);
	}
}
