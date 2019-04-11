<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\QuoteRequestAgentWidget;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
use SprykerShop\Yves\QuoteRequestAgentWidget\Dependency\Client\QuoteRequestAgentWidgetToCartClientBridge;
use SprykerShop\Yves\QuoteRequestAgentWidget\Dependency\Client\QuoteRequestAgentWidgetToCustomerClientBridge;
use SprykerShop\Yves\QuoteRequestAgentWidget\Dependency\Client\QuoteRequestAgentWidgetToPersistentCartClientBridge;
use SprykerShop\Yves\QuoteRequestAgentWidget\Dependency\Client\QuoteRequestAgentWidgetToQuoteRequestAgentClientBridge;
use SprykerShop\Yves\QuoteRequestAgentWidget\Dependency\Client\QuoteRequestAgentWidgetToQuoteRequestClientBridge;

class QuoteRequestAgentWidgetDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_QUOTE_REQUEST_AGENT = 'CLIENT_QUOTE_REQUEST_AGENT';
    public const CLIENT_QUOTE_REQUEST = 'CLIENT_QUOTE_REQUEST';
    public const CLIENT_CART = 'CLIENT_CART';
    public const CLIENT_PERSISTENT_CART = 'CLIENT_PERSISTENT_CART';
    public const CLIENT_CUSTOMER = 'CLIENT_CUSTOMER';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);
        $container = $this->addQuoteRequestAgentClient($container);
        $container = $this->addQuoteRequestClient($container);
        $container = $this->addCartClient($container);
        $container = $this->addPersistentCartClient($container);
        $container = $this->addCustomerClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addQuoteRequestAgentClient(Container $container): Container
    {
        $container[static::CLIENT_QUOTE_REQUEST_AGENT] = function (Container $container) {
            return new QuoteRequestAgentWidgetToQuoteRequestAgentClientBridge($container->getLocator()->quoteRequestAgent()->client());
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addQuoteRequestClient(Container $container): Container
    {
        $container[static::CLIENT_QUOTE_REQUEST] = function (Container $container) {
            return new QuoteRequestAgentWidgetToQuoteRequestClientBridge($container->getLocator()->quoteRequest()->client());
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCartClient(Container $container): Container
    {
        $container[static::CLIENT_CART] = function (Container $container) {
            return new QuoteRequestAgentWidgetToCartClientBridge($container->getLocator()->cart()->client());
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addPersistentCartClient(Container $container): Container
    {
        $container[static::CLIENT_PERSISTENT_CART] = function (Container $container) {
            return new QuoteRequestAgentWidgetToPersistentCartClientBridge($container->getLocator()->persistentCart()->client());
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCustomerClient(Container $container): Container
    {
        $container[static::CLIENT_CUSTOMER] = function (Container $container) {
            return new QuoteRequestAgentWidgetToCustomerClientBridge($container->getLocator()->customer()->client());
        };

        return $container;
    }
}
