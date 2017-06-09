<?php

include_once "comments.php";
include_once "business_object_base.php";

class CommentsBO extends BusinessObjectBase
{
    const ID = "id";
    const GLASS_ID = "glasses_id";
    const USER_NAME = "user_name";
    const RATING = "rating";
    const COMMENT_TEXT = "comment_text";
    const TABLE_NAME = "comments";

    private $comment;

    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    public function __construct($c)
    {
        $this->setComment($c);
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getDataSet()
    {
        $column_values = array();

        if(!empty($this->getComment()->getId()))
        {
            $column_values[self::ID] = $this->getComment()->getId();
        }

        if(!empty($this->getComment()->getGlassId()))
        {
            $column_values[self::GLASS_ID] = $this->getComment()->getGlassId();
        }

        if(!empty($this->getComment()->getUserName()))
        {
            $column_values[self::USER_NAME] = $this->getComment()->getUserName();
        }

        if(!empty($this->getComment()->getRating()))
        {
            $column_values[self::RATING] = $this->getComment()->getRating();
        }


        if(!empty($this->getComment()->getCommentText()))
        {
            $column_values[self::COMMENT_TEXT] = $this->getComment()->getCommentText();
        }

        return $column_values;
    }
}