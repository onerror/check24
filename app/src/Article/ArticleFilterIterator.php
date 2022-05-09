<?php

namespace Article;

class ArticleFilterIterator extends \FilterIterator
{
    
    private $methodName;
    private $methodArguments;
    
    public function __construct(\Iterator $offerIterator, string $methodName, array $methodArguments = [])
    {
        parent::__construct($offerIterator);
        $this->methodName = $methodName;
        $this->methodArguments = array_values($methodArguments);
    }
    
    public function accept(): bool
    {
        return (bool)$this->{$this->methodName}(...$this->methodArguments);
    }
    
    public function checkTitle($title) // todo
    {
        $article = $this->getInnerIterator()->current();
        return $article->name === $title;
    }
    
}