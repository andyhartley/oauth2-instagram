# Extended Instagram Provider for OAuth 2.0 Client
This extends the offical [The PHP League Instagram provider](https://github.com/thephpleague/oauth2-instagram) for the OAuth 2.0 Client. The offical provider allows a user to authenticate with OAuth to get a code, and exchange that for a _short lived_ token to access the Instagram API, but this only lasts around an hour and can't be renewed for another short lived toaken. However, Instagram allows you to swap that short lived token for a _long lived_ token (up to 60 days), and renew that token for as long as you have permissions for that user.

This package adds extends the provider with new methods, first to swap a short lived token for a long lived one, and second to renew that long lived token.

## Installation

To install, use composer:

```
composer require andyhartley/oauth2-instagram
```

## Usage

Usage is the same as The League's OAuth client, using `\Hartley\OAuth2\Client\Provider\Instagram` as the provider. If you're already using the official provider then you can simply swap the namespace as required.

The additional methods can be called as follows, where `$provider` is this provider, and `$accessToken` is a League `AccessTokenInterface`;

Getting a _long lived_ Instagram user token from a _short lived_ Instagram user token.

```php
$newAccessToken = $provider->getLongLivedToken([
    'access_token' => $accessToken->getToken(), // this must be a short lived token
]);
```

Refreshing a _long lived_ Instagram user token from a current _long lived_ Instagram user token.

```php
$newAccessToken = $provider->refreshLongLivedToken([
    'access_token' => $accessToken->getToken(), // this must be a long lived token that is older than 1 day, and no older than 60 days
]);
```

## License

The MIT License (MIT). The licence is included in this package.
