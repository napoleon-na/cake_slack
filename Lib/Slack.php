<?php

App::uses('HttpSocket', 'Network/Http');

class Slack
{
	protected static $_client = null;
	protected static $_settings = null;

	protected static function _getClient() {
		if (static::$_client === null) {
			static::$_client = new HttpSocket();
		}

		static::$_client->reset(true);
		static::$_client->request['header'] = [];
		return static::$_client;
	}

	public static function settings($key) {
		return Configure::read('Slack')[$key];
	}

	public static function send($message)
	{
		$client = static::_getClient();
		$payload = [
			'text' => $message,
		];

		$token = static::settings('token');
		$uri = "https://hooks.slack.com/services/{$token}";
		$request = [
			'header' => [
				'Content-Type' => 'application/json',
			]
		];

		$response = $client->post($uri, json_encode($payload), $request);
		if ($response->code !== '200' || $response->body !== 'ok') {
			return false;
		}

		return true;
	}
}
