<?php

namespace Hartley\OAuth2\Client\Provider;

use Hartley\OAuth2\Client\Grant\IgExchangeToken;
use Hartley\OAuth2\Client\Grant\IgRefreshToken;
use League\OAuth2\Client\Provider\Instagram as LeagueInstagram;
use League\OAuth2\Client\Token\AccessTokenInterface;

class Instagram extends LeagueInstagram
{
    /**
     * The override URL for access tokens
     *
     * @var string|null
     */
    protected $overrideBaseAccessTokenUrl = null;

    /**
     * The access token method
     *
     * @var string
     */
    protected $accessTokenMethod = self::METHOD_POST;

    /**
     * Returns a long lived token (from a short lived token)
     *
     * @param array $options
     * @return \League\OAuth2\Client\Token\AccessTokenInterface
     */
    public function getLongLivedToken(array $options): AccessTokenInterface
    {
        $this->overrideBaseAccessTokenUrl = $this->graphHost.'/access_token';
        $this->accessTokenMethod = self::METHOD_GET;
        return $this->getAccessToken((new IgExchangeToken), $options);
    }

    /**
     * Refreshes a long lived token (from another long lived token)
     *
     * @param array $options
     * @return \League\OAuth2\Client\Token\AccessTokenInterface
     */
    public function refreshLongLivedToken(array $options): AccessTokenInterface
    {
        $this->overrideBaseAccessTokenUrl = $this->graphHost.'/refresh_access_token';
        $this->accessTokenMethod = self::METHOD_GET;
        return $this->getAccessToken((new IgRefreshToken), $options);
    }

    /**
     * Get the access token URL
     *
     * @param array $params
     * @return string
     */
    public function getBaseAccessTokenUrl(array $params)
    {
        if ($this->overrideBaseAccessTokenUrl) {
            return $this->overrideBaseAccessTokenUrl;
        }

        return parent::getBaseAccessTokenUrl($params);
    }

    /**
     * Get the access token method
     *
     * @return string
     */
    protected function getAccessTokenMethod()
    {
        return $this->accessTokenMethod;
    }
}
