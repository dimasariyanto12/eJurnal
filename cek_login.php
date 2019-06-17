<link rel="stylesheet" type="text/css" id="theme" href="assets/css/alert/sweetalert.css"/>
<script type="text/javascript" src="assets/js/alert/jquery-1.9.1.min.js"></script>        
<script type="text/javascript" src="assets/js/alert/sweetalert-dev.js"></script>

<?php 

	session_start();
	include "Databases.php";
	$mysqli = new Databases();

	//cek data

	if (isset($_POST['masuk'])) {
		$username = stripcslashes($_REQUEST['username']);
		$password = stripcslashes($_REQUEST['password']);

	
		//query to get data user from tbl_guru
		$query=$mysqli->getData("SELECT * FROM tbl_guru where username='" .$username."' AND password ='".$password."' AND status='1' ");

		$rows = count($query);

		if ($rows==1) {
			foreach ($query as $r) {
				
				$_SESSION['id_guru'] = $r['id_guru'];
				$_SESSION['nama_guru'] = $r['nama_guru'];
				$_SESSION['username'] = $r['username'];
				$_SESSION['password'] = $r['password'];
				$_SESSION['level_guru'] = $r['level_guru'];
				$_SESSION['status'] = $r['status'];
				$_SESSION['hakAkses'] = $key;

			}
			 ?>
        <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: "Selamat anda berhasil login!", type: "success"},
               function(){ 
                 document.location='dashboard.php?page=transaksi'
               }
            );
          });
        </script>
      <?php 
            
        }
        else{
    ?>
    <script type="text/javascript">
      $( document ).ready(function() {
        swal({title: "Maaf!", text: "Password atau Username yang anda masukan salah!", type: "error"},
           function(){ 
             document.location='index.php'
           }
        );
      });
    </script>
   

<?php }} ?>