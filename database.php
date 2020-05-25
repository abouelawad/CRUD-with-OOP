<?php 


class database
{
	private $serverName = "localhost" ;
	private $userName   = "root"	  ;
	private $password	= "" 			;
	private $dbName		= "company2" ;

	private $conn = "";


	public function __construct()
	{
		$this->conn = mysqli_connect($this->serverName , $this->userName , $this->password , $this->dbName);

		if(!$this->conn)
		{
			die("Error connect : " . mysqli_connect_error());
		}
	}



	#Insert New Employee
	public function insert($sql)
	{
		if(mysqli_query($this->conn , $sql))
		{
			return "Added success";
		}
		else
		{
			die("Error :" . mysqli_error($this->conn));
		}
	}



	#update employee
	public function update($sql)
	{
		if(mysqli_query($this->conn , $sql))
		{

			return "update success";
		}
		else
		{
			die("Error :" . mysqli_error($this->conn));
		}
	}



	#read data from database
	public function read($tableName)
	{
		$sql = "SELECT * FROM $tableName";
		$result = mysqli_query($this->conn , $sql);
		$data = [];

		if($result)
		{
			if(mysqli_num_rows($result))
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$data[]=$row;
				}
			}
			return $data;
		}
		else
		{
			die("Error :" . mysqli_error($this->conn));
		}
	}


	#FIND data in database

	public function find ($tableName , $id){
		$sql = "SELECT * from $tableName where id = '$id' ";
		$result = mysqli_query($this->conn , $sql);

		if($result)
		{
			if (mysqli_num_rows($result))
			{
				return ( mysqli_fetch_assoc($result));
			}
					return false;
		}
		else
		{
			die("Error :" . mysqli_error($this->conn));
		}
	}


		#DELETE data in database

		public function delete ($tableName , $id){
		$sql = "DELETE from $tableName where id = '$id' ";
		$result = mysqli_query($this->conn , $sql);

		if($result)
		{
				return ("user deleted");
			
		}
		else
		{
			die("Error :" . mysqli_error($this->conn));
		}


	}





	#encrypt password
	public function inc_password($password)
	{
		return sha1($password);
	}
}


					// echo "<pre>";
					// print_r($row);
					// echo "<pre>";

					// echo "<pre>";
					// print_r($data);
					// echo "<pre>";