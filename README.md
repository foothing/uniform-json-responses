# PHP Uniform HTTP responses

This is a tiny package meant to be used within Laravel.
It defines a `trait` that can be used to wrap and uniform
JSON responses to a reusable format.

## Install
[composer]

## Usage
Simply add the trait to your Controller and have your controller
actions to return content via the trait `success` or `fail` api.

```php
class FooController {

	use WrapsResponses;

	public function getIndex() {
		// Do stuff
		return $this->success($dataToBeJSONed, 'Hey! It works.');
	}

	public function putIndex() {
		// Do more bad stuff.
		return $this->fail("Doh, this is broken", 500);
	}

}

```

The messages you can pass along with `success` and `fail`
will be included in a `X-Status-Message` header.


