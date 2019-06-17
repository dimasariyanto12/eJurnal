  	<?php 
    include "hak_akses.php";  
      $guru=$_SESSION['id_guru'];
  		$sql ="SELECT tbl_hari.nama_hari,tbl_jam.jam_ke,tbl_mapel.nama_mapel, tbl_kelas.nama_kelas
from tbl_jadwal
JOIN tbl_hari on tbl_jadwal.id_hari=tbl_hari.id_hari
JOIN tbl_jam on tbl_jadwal.id_jam=tbl_jam.id_jam
JOIN tbl_mapel on tbl_jadwal.id_mapel=tbl_mapel.id_mapel
JOIN tbl_kelas on tbl_jadwal.id_kelas=tbl_kelas.id_kelas
WHERE id_guru='". $guru ."'  ";
  		$result=$mysqli->getData($sql);

	  
?>
  	

  		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Mapel </h3>
            </div>
            
            <div class="box-body">
            	<input class="btn btn-primary" type="button" value="Tambahkan Mapel"><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Hari</th>
                  <th>Jam ke</th>
                  <th>Nama Mapel </th>
                  <th>Untuk Kelas</th>
                  <th>Aksi</th>
                
                </tr>
                </thead>
                <tbody>    
               <?php 
               	          		
               		    $i=1;
                   foreach ($result as $show )  {
                    	
                    
                ?>
                
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $show['nama_hari']; ?></td>
                  <td><?php echo $show['jam_ke']; ?></td>
                  <td><?php echo $show['nama_mapel']; ?></td>
                  <td><?php echo $show['nama_kelas']; ?></td>               
                  <td>

                  
                  
                    <a href="?page=kelas&aksi=ubah&id=" type="button" class="btn  btn-warning "><i class="fa fa-fw fa-pencil-square-o"></i></a>
                  
                    <a href="?page=kelas&aksi=hapus&id=" type="button" class="btn  btn-danger "><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
               
                <tr>
  
                </tfoot>
                <?php }  ?>
              </table>
            </div>
          </div>
        </div>
      </div>
