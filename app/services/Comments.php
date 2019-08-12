<?php

namespace App\Services;
use App\Config\Database;

/**
 * Class Comments
 * @package App\Services
 */
class Comments extends Database {
	
	protected $db_connection;

    /**
     * Comments constructor.
     */
    public function __construct() {
        
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        $this->db_connection = $this->db_connect();

        if (isset($_POST['action']) && $_POST['action'] === 'addComment') {
            $this->add($_POST);       
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
    public function getByBlogId($id) {

        $query = $this->db_connection->prepare('
            SELECT comment.*, posts.id as bid, users.username FROM  comment 
            LEFT JOIN posts ON posts.id = comment.blog_id 
            LEFT JOIN users ON users.id = comment.user_id 
            WHERE comment.blog_id = :postId
            ORDER BY posts.date DESC');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Add a post
     * @param array $queryData
     * @return bool
     */
    public function add(array $postData) {
        $queryData['user_id'] = $_SESSION['uid'];
        $queryData['blog_id'] = $postData['blog_id'];
        $queryData['content'] = $postData['content'];
        $query = $this->db_connection->prepare('INSERT INTO comment (user_id, blog_id, content) VALUES(:user_id, :blog_id, :content)');
        $query->bindValue(':user_id', $queryData['user_id'], \PDO::PARAM_INT);
        $query->bindValue(':blog_id', $queryData['blog_id'], \PDO::PARAM_INT);
        $query->bindValue(':content', $queryData['content']);

		return $query->execute($queryData);
    }

    /**
     * Delete a post
     * @param int $id
     * @return bool
     */
    public function delete($id) {
        $query = $this->db_connection->prepare('DELETE FROM comment WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        return $query->execute();

        // To avoid resending the form on refreshing
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
	
}