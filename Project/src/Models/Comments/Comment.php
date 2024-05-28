<?php
namespace Models\Comments;
use Services\Db;
use Models\ActiveRecordEntity;

class Comment extends ActiveRecordEntity {
    protected $articleId;
    protected $userId;
    protected $content;
    protected $createdAt;
    protected $updatedAt;

    protected static function getTableName(): string {
        return 'comments';
    }

    public static function findByArticleId(int $articleId): array {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM ' . static::getTableName() . ' WHERE article_id = :article_id';
        return $db->query($sql, [':article_id' => $articleId], static::class);
    }

    public function getContent(): string {
        return $this->content;
    }

    public function getUserId(): int {
        return $this->userId;
    }

    public function getCreatedAt(): string {
        return $this->createdAt;
    }

    public function getUpdatedAt(): string {
        return $this->updatedAt;
    }
    
}
