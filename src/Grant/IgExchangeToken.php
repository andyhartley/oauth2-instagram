<?php

namespace Hartley\OAuth2\Client\Grant;

use League\OAuth2\Client\Grant\AbstractGrant;

/**
 * An Instagram long lived exchange token grant
 *
 * @author Andy Hartley <andy.hartley@soright.co.uk>
 */
class IgExchangeToken extends AbstractGrant
{
    /**
     * @inheritdoc
     */
    protected function getName()
    {
        return 'ig_exchange_token';
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
