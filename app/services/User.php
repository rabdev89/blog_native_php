<?php
namespace App\Services;
use App\Config\Database;

/**
 * Class User
 * @package App\User
 */
class User extends Database {

	private $email;
	private $is_logged = false;
	protected $db_connection;
	private $msg = array();
	private $error = array();


	// Create a new user object
	public function __construct() {

		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    } 

	    $this->update_messages();

		$this->db_connection = $this->db_connect();

		if (isset($_SESSION['is_logged']) && $_SESSION['is_logged'])  {

			$this->is_logged = true;
			$this->username = $_SESSION['username'];
			$this->email = $_SESSION['email'];

			if (isset($_POST['action']) && $_POST['action'] === 'update' ) {

				$this->update();

			} 

		} elseif (isset($_POST['action']) && $_POST['action'] === 'login') {

			$this->login();

		} elseif (isset($_POST['action']) && $_POST['action'] === 'register') {

		
			$this->register();

		} 

		return $this;
	}


	private function update_messages() {
		if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
			$this->msg = array_merge($this->msg, $_SESSION['msg']);
			$_SESSION['msg'] = '';
		}
		if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
			$this->error = array_merge($this->error, $_SESSION['error']);
			$_SESSION['error'] = '';
		}
	}

	// Check if the user is logged
	public function is_logged() { return $this->is_logged; }

	// Login
	public function login() {

		if (!empty($_POST['email']) && !empty($_POST['password'])) {

			$this->email = $_POST['email'];
			$this->password = sha1($_POST['password']);

			if ($row = $this->verify()) {

				session_regenerate_id(true);
				$_SESSION['id'] = session_id();
				$_SESSION['username'] = $row->username;
				$_SESSION['uid'] = $row->id;
				$_SESSION['email'] = $this->email;
				$_SESSION['is_logged'] = true;
				$this->is_logged = true;
				// Set a cookie that expires in one week
				if (isset($_POST['remember'])){
					setcookie('email', $this->email, time() + 604800);
				}
				// To avoid resending the form on refreshing
				header('Location: post.php');
				exit();

			} else $this->error[] = 'Wrong user or password.';

		} elseif (empty($_POST['email'])) {

			$this->error[] = 'Email field was empty.';

		}
	}

	// Check if email and password match
	private function verify() {

		$query = $this->db_connection->prepare('
            SELECT username, email, id FROM users 
            WHERE email = :email AND password = :password LIMIT 1');

        $query->bindParam(':email', $this->email);
        $query->bindParam(':password', $this->password);
        $query->execute();
        return $query->fetch(\PDO::FETCH_OBJ);
	}

	// Logout function
	public function logout() {

		session_unset();
		session_destroy();
		$this->is_logged = false;
		setcookie('email', '', time()-3600);
		header('Location: index.php');
		exit();

	}

	// Register a new user
	public function register() {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_confirm = $_POST['password_confirm'];
		$email = $_POST['email'];

		if (!empty($email) && !empty($password) && !empty($password_confirm)) {

			if ($password == $password_confirm) {

				$queryData['password'] = sha1($password);
				$queryData['username'] = $username;
				$queryData['email'] = $email;

				$query = $this->db_connection->prepare('
					INSERT INTO users (username, password, email) 
					VALUES (:username, :password, :email)
					');
				
		        $query->bindValue(':username', $username);
		        $query->bindValue(':password', $password);
		        $query->bindValue(':email', $email);


				if ($query->execute($queryData)) {
					session_regenerate_id(true);
					$_SESSION['id'] = session_id();
					$_SESSION['uid'] = $this->db_connection->lastInsertId();
					$_SESSION['username'] = $username;
					$_SESSION['email'] = $email;
					$_SESSION['is_logged'] = true;
					$this->is_logged = true;
					$this->msg[] = 'User created.';
					$_SESSION['msg'] = $this->msg;

					header('Location: index.php');
					exit();

				} else $this->error[] = 'Username already exists.';

			} else $this->error[] = 'Passwords don\'t match.';

		} elseif (empty($email)) {

			$this->error[] = 'Email field was empty.';

		} elseif (empty($password)) {

			$this->error[] = 'Password field was empty.';

		} elseif (empty($password_confirm)) {

			$this->error[] = 'You need to confirm the password.';
		}

	}

	// Update an existing user's password
	public function update() {

		if (!empty($_POST['password']) && !empty($_POST['password_confirm'])) {

			if ($_POST['password'] === $_POST['password_confirm']) {

				$this->password = sha1($_POST['password']);

				$query = $this->db_connection->prepare('
				UPDATE users SET email=:email, username=:username, password=:password
				WHERE id = :userId LIMIT 1');
		        $query->bindValue(':userId', $_SESSION['uid'], \PDO::PARAM_INT);
		        $query->bindValue(':email', $_POST['email']);
		        $query->bindValue(':password', $this->password);
		        $query->bindValue(':username', $_POST['username']);
		        $query->execute();

				$this->msg[] = 'Your password has been changed successfully.';

			} else $this->error[] = 'Passwords don\'t match.';
 
		} else {

			$query = $this->db_connection->prepare('
			UPDATE users SET email=:email, username=:username 
			WHERE id = :userId LIMIT 1');
	        $query->bindValue(':userId', $_SESSION['uid'], \PDO::PARAM_INT);
	        $query->bindValue(':email', $_POST['email']);
	        $query->bindValue(':username', $_POST['username']);
	        $query->execute();
		}


		$_SESSION['id'] = session_id();
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['email'] = $_POST['email'];

        $this->msg[] = 'Your profile has been changed successfully.';

		// To avoid resending the form on refreshing
		$_SESSION['msg'] = $this->msg;
		$_SESSION['error'] = $this->error;
		header('Location: ' . $_SERVER['REQUEST_URI']);
		exit();
	}

	// Delete an existing user
	public function delete($id) {
		$query = $this->db_connection->prepare('DELETE FROM users WHERE id = :userId LIMIT 1');
        $query->bindParam(':userId', $id, \PDO::PARAM_INT);
        return $query->execute();
	}

	// Get info about an user
	public function getUserById($id) {
		$query = $this->db_connection->prepare('
            SELECT username, email FROM users 
            WHERE id = :userId LIMIT 1');

        $query->bindParam(':userId', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_OBJ);
	}

	public function display_info() {
		foreach ($this->msg as $msg) {
			echo '<p class="msg">' . $msg . '</p>';
		}
	}

	public function display_errors() {
		foreach ($this->error as $error) {
			echo '<p class="error">' . $error . '</p>';
		}
	}

}

?>