<?php 

    include "hak_akses.php";  
		//Query get data from tbl_mapel
		$sql = "SELECT * FROM tbl_mapel";
		$result = $mysqli->getData($sql);
 ?>



          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No </th>
                  <th>Nama Kelas</th>
                  <th>Aksi</th>
                
                </tr>
                </thead>
                <tbody>    
                <?php 
                $i=1;

                foreach ($result as $show) {
                 ?>
                    
                
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $show['nama_mapel'];?></td>
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
