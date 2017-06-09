<?php

Class Comments
{
    private $id;
    private $glassId;
    private $userName;
    private $rating;
    private $commentText;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGlassId()
    {
        return $this->glassId;
    }

    /**
     * @param mixed $glassId
     */
    public function setGlassId($glass_id)
    {
        $this->glassId = $glass_id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($user_name)
    {
        $this->userName = $user_name;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getCommentText()
    {
        return $this->commentText;
    }

    /**
     * @param mixed $commentText
     */
    public function setCommentText($comment_text)
    {
        $this->commentText = $comment_text;
    }

}