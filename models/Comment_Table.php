<?php

/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 5/1/2017
 * Time: 6:58 AM
 */

include_once "DB_Entry.php";

class Comment_Table extends Db_Entry
{
    public function saveComment($entryId, $author, $txt) {
       $sql = "INSERT INTO comment (entry_id, author, comment_txt) VALUES (?, ?, ?)";
       $data = array($entryId, $author, $txt);
       $statement = $this->makeStatement($sql, $data);
       return $statement;
    }

    public function getAllById($id) {
        $sql = "SELECT author, date, comment_txt FROM comment WHERE entry_id = ? ORDER BY comment_id DESC ";
        $data = array($id);
        $statement = $this->makeStatement($sql, $data);
        return $statement;
    }
}