<?php

/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/6/2017
 * Time: 10:48 AM
 */
include_once "Db_Entry.php";

class Blog_Entry_Table extends Db_Entry
{

    public function saveEntry($author, $title, $entry)
    {
        $entrySQL = "INSERT INTO blog_entry 
(author_name, entry_title, entry_text) VALUES (?, ?, ?)";
        $formData = Array($author, $title, $entry);
        $entryStatement = $this->makeStatement($entrySQL, $formData);
        return $this->db->lastInsertId();
    }

    public function getAllEntries()
    {
        $sql = "SELECT entry_title, entry_id, SUBSTRING(entry_text, 1, 100)
      AS intro FROM blog_entry";
        $statement = $this->makeStatement($sql);
        return $statement;
    }

    public function deleteEntry($id)
    {
        $sql = "DELETE FROM blog_entry WHERE entry_id = ?";
        $data = Array($id);
        $statement = $this->makeStatement($sql, $data);
    }

    public function updateEntry($id, $author, $title, $entry)
    {
        $sql = "UPDATE blog_entry SET author_name = ?, entry_title = ? , entry_text = ? WHERE entry_id = ?";
        $data = Array($author, $title, $entry, $id);
        $statement = $this->makeStatement($sql, $data);
        return $statement;
    }

    public function getEntry($id)
    {
        $sql = "SELECT author_name, entry_title, entry_text, date_created FROM blog_entry WHERE entry_id = ?";
        $data = Array($id);
        $statement = $this->makeStatement($sql, $data);
        $model = $statement->fetchObject();
        return $model;
    }

    public function searchEntry($searchTerm) {
        $sql = "SELECT entry_id, entry_title FROM blog_entry WHERE entry_title LIKE ? or entry_text LIKE ?";
        $data = array("%$searchTerm%", "%$searchTerm%");
        $statement = $this->makeStatement($sql, $data);
        return $statement;
    }
}
