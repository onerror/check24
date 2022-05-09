<?php

namespace Models;

use voku\db\ActiveRecord;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $email
 * @property int $status
 * @property string $date_created
 * @property int $article_id
 * @property int $author_id
 * @property User $author
 */
class Comment extends ActiveRecord
{
    public $table = 'comments';
    
    public $primaryKey = 'id';
    
    protected function init()
    {
        $this->addRelation(
            'author',
            self::BELONGS_TO,
            User::class,
            'author_id'
        );
        
    }
}