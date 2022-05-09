<?php

namespace Article;

class ArticleIterator implements \Iterator
{
    private $offers;
    /**
     * @var int
     */
    private $position = 0;
    
    public function __construct(ArticleCollectionInterface $offers)
    {
        $this->offers = $offers;
    }
    
    
    /**
     * @inheritDoc
     */
    public function current()
    {
        if (!$this->valid($this->position)){
            throw new \RuntimeException("No data to handle by iterator");
        }
        return $this->offers->get($this->getArticleIdToPositionMap()[$this->position]);
    }
    
    /**
     * @inheritDoc
     */
    public function next()
    {
        ++$this->position;
    }
    
    /**
     * @inheritDoc
     */
    public function key()
    {
        return $this->position;
    }
    
    /**
     * @inheritDoc
     */
    public function valid():bool
    {
        return isset($this->getArticleIdToPositionMap()[$this->position]);
    }
    
    /**
     * @inheritDoc
     */
    public function rewind()
    {
        $this->position = 0;
    }
    
    private function getArticleIdToPositionMap(): array
    {
        return $this->offers->getAllArticleIds();
    }
}