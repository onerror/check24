<?php

namespace Test;

use Article\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected function setUp():void
    {
        
        parent::setUp();
    }
    
    
    public function testGetPrice()
    {
        $offer = new Article(24, 'test', 34, (int)(45.10*100));
        $this->assertEquals(4510, $offer->getPrice());
    }
    
    public function testBadPrice()
    {
        $offer = new Article(24, 'test', 34, (int)(45.10*100));
        $this->assertEquals(4510, $offer->getPrice());
    }
}
