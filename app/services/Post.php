<?php

namespace App\Services;
use App\Config\Database;

/**
 * Class Post
 * @package App\Services
 */
class Post extends Database {
	
	protected $db_connection;

    /**
     * Post constructor.
     */
    public function __construct() {
        
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        $this->db_connection = $this->db_connect();

        if (isset($_POST['action']) && $_POST['action'] === 'addPost') {
            $this->add($_POST);       
        }

        if (isset($_POST['action']) && $_POST['action'] === 'editPost') {
            $this->update($_POST);       
        }

        if (isset($_POST['delete'])) {
            $this->delete($_POST['delete']);       
        }
    }

    /**
     * Get all posts
     * @return array
     */
    public function getAll() {
        $query = $this->db_connection->query('
            SELECT posts.*, users.username, users.id as uid FROM  posts 
            LEFT JOIN users ON posts.author = users.id 
            ORDER BY date DESC');
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Get a post by it's user ID
     * @return array
     */
    public function getByUserId($id) {

        $query = $this->db_connection->prepare('
            SELECT posts.*, users.username, users.id as uid FROM  posts 
            LEFT JOIN users ON posts.author = users.id 
            WHERE users.id = :userId
            ORDER BY posts.date DESC');
        $query->bindParam(':userId', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Get a post by it's ID
     * @param int $id
     * @return mixed
     */
    public function getById($id) {
		//Normally we wouldn't be using LIMIT here, as the ID is unique anyways. But it's better to have several check ups to have exactly what we need.
        $query = $this->db_connection->prepare('
            SELECT posts.*, users.username FROM posts 
            LEFT JOIN users ON posts.author = users.id  WHERE posts.id = :postId LIMIT 1');

        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Add a post
     * @param array $queryData
     * @return bool
     */
    public function add(array $postData) {
        $queryData['author'] = $_SESSION['uid'];
        $queryData['title'] = $postData['title'];
        $queryData['small_desc'] = $postData['small_desc'];
        $queryData['content'] = $postData['content'];
        $query = $this->db_connection->prepare('INSERT INTO posts (title, small_desc, content, author) VALUES(:title, :small_desc, :content, :author)');
        $query->bindValue(':title', $queryData['title']);
        $query->bindValue(':small_desc', $queryData['small_desc']);
        $query->bindValue(':content', $queryData['content']);
        $query->bindValue(':author', $queryData['author'], \PDO::PARAM_INT);
		return $query->execute($queryData);
    }

    /**
     * Updating an existing post by passing as a parametre the data as an array
     * @param array $data
     * @return bool
     */
    public function update(array $data) {
        $query = $this->db_connection->prepare('UPDATE posts SET title=:title, small_desc=:small_desc, content=:content, date=NOW() WHERE id = :postId LIMIT 1');
        $query->bindValue(':postId', $data['key'], \PDO::PARAM_INT);
        $query->bindValue(':title', $data['title']);
        $query->bindValue(':small_desc', $data['small_desc']);
        $query->bindValue(':content', $data['content']);
        return $query->execute();

        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }

    /**
     * Delete a post
     * @param int $id
     * @return bool
     */
    public function delete($id) {
        $query = $this->db_connection->prepare('DELETE FROM posts WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        return $query->execute();

        // To avoid resending the form on refreshing
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
	
}