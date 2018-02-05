<?php

class api
{
	private $db;

	/**
	 * Constructor - open DB connection
	 *
	 * @param none
	 * @return database
	 */
	function __construct()
	{
		$conf = json_decode(file_get_contents('configuration.json'), TRUE);
		$this->db = new mysqli($conf["host"], $conf["user"], $conf["password"], $conf["database"]);
	}

	/**
	 * Destructor - close DB connection
	 *
	 * @param none
	 * @return none
	 */
	function __destruct()
	{
		$this->db->close();
	}

	/**
	 * Get the list of users
	 *
	 * @param none or user username
	 * @return list of data on JSON format
	 */
	
	
	function getData()
	{
		$query = "select * from persons";
		$list = array();
		$result = $this->db->query($query);
		while ($row = $result->fetch_assoc())
		{
			$list[] = $row;
		}
		return $list;
	}
    
    function addData($params)
	{
		$query = "INSERT INTO persons(firstName,lastName,gender,address) VALUES ('".$params['fname']."', '".$params['lname']."', '".$params['gender']."', '".$params['address']."')";
       if ($this->db->query($query) === TRUE) {
    		        $result = 1;  
		} else {
		   $result = 0;
		}
		
// 		echo $params['nopol'];
		
		return $result;
	}
    
    
     function deleteData($params)
	{
		$query = "delete from persons where id = ".$params['id']."";
       if ($this->db->query($query) === TRUE) {
    		        $result = 1;  
		} else {
		   $result = 0;
		}
		
// 		echo $params['nopol'];
		
		return $result;
	}

   

}
