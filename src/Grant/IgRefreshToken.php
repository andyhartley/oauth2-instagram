<?php

namespace Hartley\OAuth2\Client\Grant;

use League\OAuth2\Client\Grant\AbstractGrant;

/**
 * An Instagram long lived refresh token grant
 */
class IgRefreshToken extends AbstractGrant
{
    /**
     * @inheritdoc
     */
    protected function getName()
    {
        return 'ig_refresh_token';
    }

    /**
     * @inheritdoc
     */
    protected function getRequiredRequestParameters()
    {
        return [
            'access_token',
        ];
    }
}
