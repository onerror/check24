<?php

namespace Article;

class Article implements ArticleInterface
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var int
     */
    private $vendorId;
    /**
     * @var int
     */
    private $price;
    
    public function __construct(int $offerId, string $productTitle, int $vendorId, int $price)
    {
        $this->id = $offerId;
        $this->title = $productTitle;
        $this->vendorId = $vendorId;
        $this->price = $price;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @return int
     */
    public function getVendorId()
    {
        return $this->vendorId;
    }
    
    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }
}