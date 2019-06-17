<?php 
	
  include "hak_akses.php";  
	//Get Data on table kelas and tbl_guru
	$sql="SELECT * FROM tbl_guru   ";
	$result =$mysqli->getData($sql);

 ?>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="GET">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Guru</th>
                  <th>Data Jadwal</th>
                  <th>Aksi</th>
                
                </tr>
                </thead>
                <tbody>    
               <?php 

               $i=1;
               	foreach ($result as $show ) {              		

                ?>
                
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $show['nama_guru']; ?></td>
                  <td>	<a href="?page=guru&aksi=detail&id_guru=<?php echo $show['id_guru'] ?>" type="button" class="btn  btn-info "><i class="fa fa-fw  fa-info"></i>Lihat</a>
                  </td>
                  <td>

                  
                    <a href="?page=kelas&aksi=ubah&id=" type="button" class="btn  btn-warning "><i class="fa fa-fw fa-pencil-square-o"></i></a>
                  
                    <a href="?page=kelas&aksi=hapus&id=" type="button" class="btn  btn-danger "><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
               
                <tr>
  
                </tfoot>
                <?php } ?>
                </form>
              </table>
            </div>
          </div>
        </div>
      </div>
