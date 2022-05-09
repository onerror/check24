<?php

namespace Reader;

use Article\ArticleCollectionInterface;

/**
 * The interface provides the contract for different readers
 * E.g. it can be XML/JSON Remote Endpoint, or CSV/JSON/XML local files
 */
interface ReaderInterface
{
    public function __construct(ArticleCollectionInterface $offerCollection);
    
    /**
     * Read in incoming data and parse to objects
     */
    public function read(string $input): ArticleCollectionInterface;
}