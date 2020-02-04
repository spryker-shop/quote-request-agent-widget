<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\QuoteRequestAgentWidget\Generator;

interface RedirectResponseGeneratorInterface
{
    /**
     * @return string
     */
    public function generateCheckoutShipmentRedirectUrl(): string;
}
