<?php

namespace Test;

use Article\Article;
use Article\ArticleCollection;
use Article\ArticleIterator;
use PHPUnit\Framework\TestCase;

class ArticleCollectionTest extends TestCase
{
    private $offerCollection;
    protected function setUp():void
    {
        $this->offerCollection = new ArticleCollection();
        parent::setUp();
    }
    
    public function testAddOffer()
    {
        $offer = new Article(24, 'test', 34, (int)(45.10 * 100));
        $this->offerCollection->addOffer($offer);
    
        $this->assertInstanceOf(Article::class, $this->offerCollection->get(24));

    }
    
    public function testGetIterator()
    {
        $this->assertInstanceOf(ArticleIterator::class, $this->offerCollection->getIterator());
    }
    
    
}
