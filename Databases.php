<?php 

$key                = "sdfkgsdjsmenqeufdvxbnsdjskaklslwhksfjxfnmsdkwei";
class Databases{
	public $host='localhost';
	public $name='root';
	public $pass='dimasari123';
	public $dbname='db_jurnal';
	public $mysqli;


	function __construct() {

		$this->mysqli= new mysqli($this->host,$this->name,$this->pass,$this->dbname);

		if ($this->mysqli->connect_errno) {
			?>

			<script type="text/javascript">
				alert("Maaf Database tidak ada!!");
			</script>
			<?php
			exit;
		}
	}

	
	//Function Ambil Data 
	public function getData($query)
	{       
		$result = $this->mysqli->query($query);
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}

}

//Function Date Indo
function DateIndo($str){
       $tr   = trim($str);
       $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'), 
       						array('Maaf Hari Ini Libur', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Maaf Hari Ini Libur'), $tr);
       return $str;
   }


   
?>