<?php

namespace Models;

use voku\db\ActiveRecord;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $author_id
 * @property int $status
 * @property string $picture_url
 * @property string $date_created
 * @property Comment[] $comments
 * @property User $author

 */
class Article extends ActiveRecord
{
    public $table = 'articles';
    
    public $primaryKey = 'id';
    
    protected function init()
    {
        $this->addRelation(
            'comments',
            self::HAS_MANY,
            Comment::class,
            'user_id'
        );
        
        $this->addRelation(
            'author',
            self::HAS_ONE,
            User::class,
            'author_id'
        );
    }
}