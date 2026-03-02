<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\QuoteRequestAgentWidget\Widget;

use Generated\Shared\Transfer\QuoteRequestTransfer;
use Spryker\Yves\Kernel\Widget\AbstractWidget;

/**
 * @method \SprykerShop\Yves\QuoteRequestAgentWidget\QuoteRequestAgentWidgetFactory getFactory()
 */
class QuoteRequestAgentCancelWidget extends AbstractWidget
{
    /**
     * @var string
     */
    protected const PARAMETER_QUOTE_REQUEST = 'quoteRequest';

    /**
     * @var string
     */
    protected const PARAMETER_IS_QUOTE_REQUEST_CANCELABLE = 'isQuoteRequestCancelable';

    public function __construct(QuoteRequestTransfer $quoteRequestTransfer)
    {
        $this->addQuoteRequestParameter($quoteRequestTransfer);
        $this->addIsQuoteRequestCancelableParameter($quoteRequestTransfer);
    }

    public static function getName(): string
    {
        return 'QuoteRequestAgentCancelWidget';
    }

    public static function getTemplate(): string
    {
        return '@QuoteRequestAgentWidget/views/quote-request-agent-cancel-link/quote-request-agent-cancel-link.twig';
    }

    protected function addQuoteRequestParameter(QuoteRequestTransfer $quoteRequestTransfer): void
    {
        $this->addParameter(static::PARAMETER_QUOTE_REQUEST, $quoteRequestTransfer);
    }

    protected function addIsQuoteRequestCancelableParameter(QuoteRequestTransfer $quoteRequestTransfer): void
    {
        $isQuoteRequestCancelable = $this->getFactory()
            ->getQuoteRequestAgentClient()
            ->isQuoteRequestCancelable($quoteRequestTransfer);

        $this->addParameter(static::PARAMETER_IS_QUOTE_REQUEST_CANCELABLE, $isQuoteRequestCancelable);
    }
}
