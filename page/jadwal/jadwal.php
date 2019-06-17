  	<?php 
      include "hak_akses.php";

         
          
  		$sql ="SELECT * FROM tbl_jadwal j,tbl_guru g,tbl_kelas k,tbl_mapel m ,tbl_hari h, tbl_jam jm WHERE j.id_guru=g.id_guru And j.id_mapel=m.id_mapel AND j.id_kelas=k.id_kelas AND j.id_hari=h.id_hari and j.id_jam=jm.id_jam order by j.id_hari desc";
  		$result=$mysqli->getData($sql);

?>
  	

  		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Jadwal </h3>
            </div>
            
            <div class="box-body">
            	<input class="btn btn-primary" type="button" value="Tambahkan jadwal"><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <td>Hari</td>
                  <th>Jam ke</th>
                  <th>Nama Mapel </th>
                  <th>Guru Pengajar</th>
                  <th>Untuk Kelas</th>
                  <th>Aksi</th>
                
                </tr>
                </thead>
                <tbody>    
               <?php 
               	          		
               		$i++;
                  foreach ($result as $show ) {
                    # code...
                  
                    
                ?>
                
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $show['nama_hari'] ?></td>
                  <td><?php  echo $show['jam_ke'] ?></td>
                  <td><?php echo $show['nama_mapel']; ?></td>
                  <td><?php echo $show['nama_guru'] ?></td>
                  <td><?php echo$show['nama_kelas']; ?></td>
                  
                  
                  <td>

                  
                  
                    <a href="?page=kelas&aksi=ubah&id=" type="button" class="btn  btn-warning "><i class="fa fa-fw fa-pencil-square-o"></i></a>
                  
                    <a href="?page=kelas&aksi=hapus&id=" type="button" class="btn  btn-danger "><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
               
                <tr>
  
                </tfoot>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
