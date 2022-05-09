<?php

namespace Reader;

use Article\Article;
use Article\ArticleCollectionInterface;

class ArticlesJsonReader implements ReaderInterface
{
    /**
     * @var ArticleCollectionInterface
     */
    private $offerCollection;
    
    public function __construct(ArticleCollectionInterface $offerCollection)
    {
        $this->offerCollection = $offerCollection;
    }
    /**
     * @inheritDoc
     */
    public function read(string $input): ArticleCollectionInterface
    {
        $offersData = json_decode($input, true);
        foreach ($offersData as $offerData){
            $this->offerCollection->addOffer(new Article((int)$offerData['offerId'], (string)$offerData['productTitle'],
                                                         (int)$offerData['vendorId'], (int)($offerData['price']*100)));
        }
        
        return $this->offerCollection;
    }
}