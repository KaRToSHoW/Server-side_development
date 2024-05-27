<?php
namespace Models\Comments;

use Models\ActiveRecordEntity;
use Services\Db;

class Comment extends ActiveRecordEntity {
    protected $articleId;
    protected $userId;
    protected $content;
    protected $createdAt;
    protected $updatedAt;

    public function getArticleId() {
        return $this->articleId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setArticleId($articleId) {
        $this->articleId = $articleId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    protected static function getTableName(): string {
        return 'comments';
    }

    public static function getAllByArticleId(int $articleId): ?array {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `' . static::getTableName() . '` WHERE `article_id` = :articleId';
        return $db->query($sql, [':articleId' => $articleId], static::class);
    }
}
