# Implementation of WordPress Nonces in an object oriented way

## How to use

Create nonce
```php
	$nonce = \Nonce\Wrapper::wp_create_nonce();
```

Verify nonce
```php
	$isValid = \Nonce\Wrapper::wp_verify_nonce($nonce);
```

Create nonce hidden input
```php
	\Nonce\Wrapper::wp_nonce_field();
```

Generate nonce URL:
```php
	$url = \Nonce\Wrapper::wp_nonce_url('http://www.google.com');
```

Check if request was been referred from an admin screen:
```php
	$admin = \Nonce\Wrapper::check_admin_referer();
```

Verifies the AJAX request to prevent processing requests external of the blog.
```php
	$ajax = \Nonce\Wrapper::check_ajax_referer();
```

## Testing
```php
vendor/bin/phpunit
```

Do update the WP_INSTALL constant in phpunit.xml to a local working WordPress installation

## Changelog

### 0.1 
Initial version