<?php

namespace Article;

use Iterator;

/**
 * Interface for The Collection class that contains Offers
 */
interface ArticleCollectionInterface
{
    public function get(int $offerId): ArticleInterface;
    
    public function getIterator(): Iterator;
    
    public function addOffer(ArticleInterface $offer);
    
    public function removeOffer(int $offerId);
    
    public function getAllArticleIds(): array;
}