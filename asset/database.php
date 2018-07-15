<?php
	class database
	{
		private $hostname = '127.0.0.1';
		private $username = 'root';
		private $password = '';
		private $database = 'dbatol';
		public $conn = '';

		public function cn()
		{
			$this->conn = mysqli_connect(
				$this->hostname, 
				$this->username, 
				$this->password, 
				$this->database);
			if ($this->conn) {
				return true;
			}
			if (!$this->conn) {
				return false;
			}
			if (mysqli_connect_errno()) {
				return "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		}
		public function cl()
		{
			return $this->conn->close();
		}

		//query
		public function insert($name, $email, $password, $status)
		{
			if ($this->cn()) {
				$q = $this->conn->query("insert into users (name, email, password, status) values('".$name."', '".$email."', '".md5($password)."', '".$status."')");
				if ($q) {
					return 'Success';
				} else {
					return $this->conn->error;
				}
			} else {
				return 'connection failed';
			}
			$this->cl();
		}
		public function delete($iduser, $status)
		{
			if ($this->cn()) {
				$q = $this->conn->query("delete from users where iduser='".$iduser."' and status='".$status."'");
				if ($q) {
					return 'Success';
				} else {
					return $this->conn->error;
				}
			} else {
				return 'connection failed';
			}
			$this->cl();
		}
		public function get_all()
		{
			if ($this->cn()) {
				$q = $this->conn->query("select idusers, name, email, status, created from users");
				if ($q->num_rows > 0) {
					while ($data = $q->fetch_array()) {
						$datas[] = $data;
					}
					return $datas;
				} else {
					return "Empty";
				}
			} else {
				return 'Empty';
			}
			$this->cl();
		}

		public function get_detail($idusers)
		{
			if ($this->cn()) {
				$q = $this->conn->query("select idusers, name, email, status, created from users where idusers=".$idusers);
				if ($q->num_rows > 0) {
					while ($data = $q->fetch_array()) {
						$datas[] = $data;
					}
					return $datas;
				} else {
					return 'Empty';
				}
			} else {
				return $this->conn->error;
			}
			$this->cl();
		}

		public function auth($email, $password, $status)
		{
			if ($this->cn()) {
				$q = $this->conn->query("select idusers, status from users where email='".$email."' and password='".md5($password)."' and status='".$status."'");
				if ($q->num_rows > 0) {
					while ($data = $q->fetch_array()) {
						$datas[] = $data;
					}
					return $datas;
				}
				elseif (empty($q->num_rows)) {
					return 'Empty';
				} else {
					return $this->conn->error;
				}
			} else {
				return $this->conn->error;
			}
			$this->cl();
		}
	}
	