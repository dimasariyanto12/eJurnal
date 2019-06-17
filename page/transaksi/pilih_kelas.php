 <?php 


	$sql="SELECT * FROM tbl_jadwal j left join  tbl_kelas k on j.id_kelas=k.id_kelas where id_guru='$id_guru' ";
	$result=$mysqli->getData($sql);
  ?>


 <div class="row">
        <div class="col-md-12">
       
          <div class="box box-widget widget-user-2">
            
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="dist/img/logo.png" alt="User Avatar">
              </div>
              
              <h3 class="widget-user-username"><?php echo $nama_guru ?></h3>
              <h5 class="widget-user-desc"><?php echo $level_guru; ?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Mapel Saya <span class="pull-right badge bg-blue">3</span></a></li>
                <li><a href="#">Jadwal Saya <span class="pull-right badge bg-aqua">5</span></a></li>
                <li><a href="#">Jurnal Saya <span class="pull-right badge bg-green">12</span></a></li>
                
              </ul>
            </div>
          </div>
          
         <center>
        <div class="col-md-12" align="center">
 			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelas Saya</h3>
            </div>
           
            <form method="GET" >
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                	<th ></th>
                 <center><th>KELAS</th></center> 
                  <center><th >AKSI</th></center>
                
                </tr>

                <?php foreach ($result as $show){

                 ?>
                	
              
                <tr>
              <td></td>
                  <td align="left"><?php echo $show['nama_kelas'] ?></td>
                  <td align="left"> <a type="submit" class="btn btn-success" href="?page=transaksi&aksi=masuk&id_kelas=<?php echo $show['id_kelas'] ?>" >Lihat</a></td>
                                  
                </tr>
                 <?php } ?>
              </table>
              

            </div>
        </form>
      </div>
    </div>
      </div></center>