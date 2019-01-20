<?php
/**
 * RKD Banklink.
 *
 * @link https://github.com/renekorss/Banklink/
 *
 * @author Rene Korss <rene.korss@gmail.com>
 * @copyright 2016-2018 Rene Korss
 * @license MIT
 */
namespace RKD\Banklink;

use RKD\Banklink\Protocol\IPizza;

/**
 * Banklink settings for Luminor.
 *
 * For more information, please visit:
 * https://www.luminor.ee/en/e-payment
 *
 * @author Rene Korss <rene.korss@gmail.com>
 */

class Luminor extends Banklink
{
    /**
     * Request url.
     *
     * @var mixed
     */
    protected $requestUrl = [
        'payment' => 'https://netbank.nordea.com/pnbepay/epayp.jsp',
        'auth' => 'https://netbank.nordea.com/pnbeid/eidp.jsp'
    ];

    /**
     * Test request url.
     *
     * @var mixed
     */
    protected $testRequestUrl = [
        'payment' => 'https://netbank.nordea.com/pnbepaytest/epayp.jsp',
        'auth' => 'https://netbank.nordea.com/pnbeidtest/eidp.jsp',
    ];

    /**
     * Force Luminor class to use IPizza protocol.
     *
     * @param RKD\Banklink\Protocol\IPizza $protocol   Protocol used
     */
    public function __construct(IPizza $protocol)
    {
        parent::__construct($protocol);
    }

    /**
     * Override encoding field.
     */
    protected function getEncodingField() : string
    {
        return 'VK_ENCODING';
    }

    /**
     * By default uses UTF-8.
     *
     * @return array Array of additional fields to send to bank
     */
    protected function getAdditionalFields() : array
    {
        return [
            'VK_ENCODING' => $this->requestEncoding,
        ];
    }
}
