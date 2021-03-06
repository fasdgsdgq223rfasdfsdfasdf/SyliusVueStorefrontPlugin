<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusVueStorefrontPlugin\Factory\Cart;

use BitBag\SyliusVueStorefrontPlugin\View\Cart\ShippingMethodsView;
use Sylius\Component\Core\Model\ShippingMethodInterface;

interface ShippingMethodsViewFactoryInterface
{
    /**
     * @param ShippingMethodInterface[] $shippingMethods
     *
     * @return array|ShippingMethodsView[]
     */
    public function createList(ShippingMethodInterface ...$shippingMethods): array;
}
