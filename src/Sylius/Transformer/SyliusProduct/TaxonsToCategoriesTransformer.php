<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusVueStorefrontPlugin\Sylius\Transformer\SyliusProduct;

use BitBag\SyliusVueStorefrontPlugin\Document\Product\Category;
use BitBag\SyliusVueStorefrontPlugin\Document\Product\Category\Entity;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\TaxonInterface;

final class TaxonsToCategoriesTransformer implements TaxonsToCategoriesTransformerInterface
{
    /** @param Collection|TaxonInterface[] $taxons */
    public function transform(Collection $taxons): Category
    {
        $categories = [];
        $categoriesIds = [];

        /** @var TaxonInterface $taxon */
        foreach ($taxons as $taxon) {
            $categories[] = new Entity(
                $taxon->getId(),
                $taxon->hasChildren(),
                $taxon->getName(),
                \strtolower(sprintf('%s_%d', $taxon->getName(), $taxon->getId())),
                \strtolower(\str_replace(' ', '', $taxon->getFullname()))
            );
            $categoriesIds[] = (string) $taxon->getId();
        }

        return new Category($categories, $categoriesIds);
    }
}
