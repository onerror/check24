<?php

namespace Article;

use Iterator;

class ArticleCollection implements ArticleCollectionInterface
{
    private $offers = [];
    
    /**
     * @param ArticleInterface $offer
     */
    public function addOffer(ArticleInterface $offer)
    {
        if (isset($this->offers[$offer->getId()])) {
            throw new \RuntimeException("Article with offerId = " . $offer->getId() . " already exists");
        }
        $this->offers[$offer->getId()] = $offer;
    }
    
    /**
     * @param ArticleInterface $offer
     */
    public function updateOffer(ArticleInterface $offer)
    {
        if (!isset($this->offers[$offer->getId()])) {
            throw new \RuntimeException("Article with offerId = " . $offer->getId() . " doesn't exist");
        }
        $this->offers[$offer->getId()] = $offer;
    }
    
    /**
     * @param int $offerId
     */
    public function removeOffer(int $offerId)
    {
        unset ($this->offers[$offerId]);
    }
    
    public function exists(int $offerId):bool{
        return isset($this->offers[$offerId]);
    }
    
    public function get(int $offerId): ArticleInterface
    {
        if (!$this->exists($offerId)){
            throw new \RuntimeException("Article $offerId doesn't exist!");
        }else{
            return $this->offers[$offerId];
        }
    }
    
    public function getAllArticleIds():array
    {
        return array_keys($this->offers);
    }
    
    public function getIterator(): Iterator
    {
        return new ArticleIterator($this);
    }
}