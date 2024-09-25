<?php

namespace Http\Repositories;

use Core\App;

class NotesRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve('Core\Database');
    }
    public function getByUserId($userId)
    {
        $query = "SELECT * FROM notes WHERE user_id = :user_id";
        return $this->db->query($query, ['user_id' => $userId])->get();
    }
    public function getById($noteId)
    {
        $query = "SELECT * FROM notes WHERE id = :note_id";
        return $this->db->query($query, ['note_id' => $noteId])->findOrFail();
    }
    public function updateById($noteId, $body)
    {
        $query = "UPDATE notes SET body = :body WHERE id = :note_id";
        $this->db->query($query, ['body' => $body, 'note_id' => $noteId]);
    }
    public function create($note)
    {
        $query = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)";
        $this->db->query($query, ['body' => $note['body'], 'user_id' => $note['user_id']]);
    }
    public function deleteById($noteId)
    {
        $query = "DELETE FROM notes WHERE id = :note_id";
        $this->db->query($query, ['note_id' => $noteId]);
    }
}
