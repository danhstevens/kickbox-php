<p align="center">
  <a href="https://kickbox.com"><img src="https://static.kickbox.io/kickbox_github.png" alt="Kickbox Email Verification Service"></a>
  <br>
</p>

# Email Verification & Confirmation Library for PHP

[![Travis CI](https://travis-ci.org/kickboxio/kickbox-php.svg?branch=master)](https://travis-ci.org/kickboxio/kickbox-php)
[![Downloads](https://img.shields.io/packagist/dt/kickbox/kickbox.svg?maxAge=3600)](https://packagist.org/packages/kickbox/kickbox)
[![Packagist](https://img.shields.io/packagist/v/kickbox/kickbox.svg?maxAge=3600)](https://packagist.org/packages/kickbox/kickbox)
[![Slack Status](http://slack.kickbox.com/badge.svg)](http://slack.kickbox.com)

Our [Email Verification](https://kickbox.com/email-verification) API ensures you only send to real email addresses and prevents sending to invalid, mistyped, and disposable email addresses. The [Trust (Email Confirmation)](https://kickbox.com/trust) API is an email confirmation service that ensures your users own the email address they provide and prevents bots and malicious users from creating fake accounts.

## Getting Started & Authenticating

Let's include the Kickbox library and set your API key:

```php
require_once 'vendor/autoload.php';
$kickbox = new Kickbox\Api('YOUR_API_KEY');
```

- - - - 

# Email Address Verification Methods
* **[`verification->verify`](#verification-verify)** - Verify a single email address
* **[`verification->verifyBatch`](#verification-verifybatch)** - Verify multiple email addresses (up to 1 million)
* **[`verification->verifyBatchStatus`](#verification-verifybatchstatus)** - Check on the status of a batch verification job
* **[`verification->balance`](#verification-balance)** - Check your verification credit balance

# Trust Methods
* **[`trust->validate`](#trust-validate)** - Validate a user's Trust token

- - - - 

## `verification->verify`
Verify a single email address

### Usage

```php
try {
  $results = $kickbox->verification->verify("test@exmample.com");
} catch (Exception $e) {
  // handle exception
}
```

#### Options

* **timeout** `integer` (optional) - Maximum time, in milliseconds, for the API to complete a verification request. Default: 6000. Max: 30000

```php
// Example with options
$results = $kickbox->verification->verify("test@exmample.com", 6000);
```

### Response

See our [API Reference Documentation](https://docs.kickbox.com/v2.0/reference#section-response-values) for full response details.

## `verification->verifyBatch`
Verify multiple email addresses (up to 1 million)

### Usage

```php
$emails = "test1@example.com\ntest2@example.com"; // Email addresses separated by new lines (or CSV format with one email per line)

try {
  $results = $kickbox->verification->verifyBatch($emails);
} catch (Exception $e) {
  // handle exception
}
```

#### Options

* **callbackUrl** `string` (optional) - If a valid URL is specified, Kickbox will send a HTTP **POST**  containing the results of the job to it when the batch verification completes.
* **filename** `string` (optional) - The file containing your results will have the specified name.

```php
// Example with options
$results = $kickbox->verification->verifyBatch($emails, $callbackUrl, $filename);
```

### Response
* **id** `integer` - The ID of the verification job
* **message** `string` - Additional information from the server
* **success** `boolean` - _true_ if the API request did not result in any unexpected errors

## `verification->verifyBatchStatus`
Check on the status of a batch verification job

### Usage

```php
try {
  $results = $kickbox->verification->verifyBatchStatus($jobId);
} catch (Exception $e) {
  // handle exception
}
```

### Response

See our [API Reference Documentation](https://docs.kickbox.com/v2.0/reference#check-job-status) for full response details.

## `verification->balance`
Check your verification credit balance

### Usage

```php
try {
  $results = $kickbox->verification->balance();
} catch (Exception $e) {
  // handle exception
}
```

### Response
* **balance** `integer` - Your verification credit balance
* **message** `string` - Additional information from the server
* **success** `boolean` - _true_ if the API request did not result in any unexpected errors

- - - - 

## `trust->validate`
Check that the Trust token is real

### Usage

```php
try {
  $results = $kickbox->trust->validate($appId, $token, $email);
} catch (Exception $e) {
  // handle exception
}
```

#### Parameters

* **appId** `string` - Find this on the `connect` page for your app. This is the same for both test and production modes.
* **token** `string` - The token provided from the front-end library. See [Client Side Installation](https://docs.kickbox.com/docs/client-side-installation).
* **email** `string` (optional) - The email of the user signing up. This is cross-referenced with the email used to generate the token, so this must be the same email address the user entered into your form.

- - - - 

## License
MIT

## Bug Reports
Report [here](https://github.com/kickboxio/kickbox-node/issues).

## Need Help?
* Slack with us: http://slack.kickbox.com/
* Email us: help@kickbox.com
