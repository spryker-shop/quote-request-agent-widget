<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\QuoteRequestAgentWidget\Dependency\Client;

use Generated\Shared\Transfer\QuoteRequestFilterTransfer;
use Generated\Shared\Transfer\QuoteRequestOverviewCollectionTransfer;
use Generated\Shared\Transfer\QuoteRequestOverviewFilterTransfer;
use Generated\Shared\Transfer\QuoteRequestResponseTransfer;
use Generated\Shared\Transfer\QuoteRequestTransfer;

class QuoteRequestAgentWidgetToQuoteRequestAgentClientBridge implements QuoteRequestAgentWidgetToQuoteRequestAgentClientInterface
{
    /**
     * @var \Spryker\Client\QuoteRequestAgent\QuoteRequestAgentClientInterface
     */
    protected $quoteRequestAgentClient;

    /**
     * @param \Spryker\Client\QuoteRequestAgent\QuoteRequestAgentClientInterface $quoteRequestAgentClient
     */
    public function __construct($quoteRequestAgentClient)
    {
        $this->quoteRequestAgentClient = $quoteRequestAgentClient;
    }

    public function updateQuoteRequest(QuoteRequestTransfer $quoteRequestTransfer): QuoteRequestResponseTransfer
    {
        return $this->quoteRequestAgentClient->updateQuoteRequest($quoteRequestTransfer);
    }

    public function getQuoteRequestOverviewCollection(
        QuoteRequestOverviewFilterTransfer $quoteRequestOverviewFilterTransfer
    ): QuoteRequestOverviewCollectionTransfer {
        return $this->quoteRequestAgentClient->getQuoteRequestOverviewCollection($quoteRequestOverviewFilterTransfer);
    }

    public function findQuoteRequestByReference(string $quoteRequestReference): ?QuoteRequestTransfer
    {
        return $this->quoteRequestAgentClient->findQuoteRequestByReference($quoteRequestReference);
    }

    public function findQuoteRequest(QuoteRequestFilterTransfer $quoteRequestFilterTransfer): ?QuoteRequestTransfer
    {
        return $this->quoteRequestAgentClient->findQuoteRequest($quoteRequestFilterTransfer);
    }

    public function isQuoteRequestCancelable(QuoteRequestTransfer $quoteRequestTransfer): bool
    {
        return $this->quoteRequestAgentClient->isQuoteRequestCancelable($quoteRequestTransfer);
    }
}
