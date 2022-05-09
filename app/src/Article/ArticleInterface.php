<?php

namespace Article;

/**
 * Interface of Data Transfer Object, that represents external JSON data
 */
interface ArticleInterface
{
    public function __construct(int $offerId, string $productTitle, int $vendorId, int $price);
    
    public function getId();
    
    public function getTitle();
    
    public function getVendorId();
    
    public function getPrice();
    
    
}