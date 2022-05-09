<?php

namespace Models;
// todo
use voku\db\ActiveRecord;

/**
 * @property int $id
 * @property string $login
 * @property string $pass
 * @property string $real_name
 * @property string $registration_date
 * @property int $status

 */
class User extends ActiveRecord
{
    public $table = 'users';
    
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
            'articles',
            self::HAS_MANY,
            Article::class,
            'user_id'
        );
        
    }
}