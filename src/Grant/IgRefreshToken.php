<?php

namespace Hartley\OAuth2\Client\Grant;

use League\OAuth2\Client\Grant\AbstractGrant;

/**
 * An Instagram long lived refresh token grant
 *
 * @author Andy Hartley <andy.hartley@soright.co.uk>
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
