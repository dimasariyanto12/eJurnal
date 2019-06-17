<?php 




$kelas=$_GET['id_kelas'];
$guru=$_SESSION['id_guru'];
$sql = "SELECT tbl_jurnal.id_guru, tbl_jurnal.id_jurnal,tbl_jurnal.htgl,tbl_jurnal.indikator_materi, tbl_kelas.nama_kelas, tbl_jam.jam_ke,tbl_mapel.nama_mapel
FROM tbl_jurnal
JOIN tbl_jam ON tbl_jurnal.id_jam = tbl_jam.id_jam
JOIN tbl_kelas ON tbl_jurnal.id_kelas = tbl_kelas.id_kelas 
JOIN tbl_mapel ON tbl_jurnal.id_mapel = tbl_mapel.id_mapel
where  id_guru='".$guru."' AND tbl_jurnal.id_kelas= '".$kelas."' ";
$result=$mysqli->getData($sql);
                  $i++;
                  foreach ($result as $show ){ 
                ?>
                    


<div class="box box-default">
        <div class="box-header with-border"><br>
        <center> <h3 class="box-title" >JURNAL HARIAN GURU TAHUN AJARAN 2018/2019</h3></center> 
        <br>

         
        <!-- /.box-header -->
        <div class="box-body">
         <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Nama Guru :</dt>
                <dd><?php echo $nama_guru ?></dd>
                <dt>Semester:</dt>
                <dd>II</dd>
                <dt>Mapel :</dt>
                <dd><?php echo $show['nama_mapel'] ?></dd>
                <dt>Kelas :</dt>
                <dd><?php echo $show['nama_kelas'] ?></dd>
              </dl>
            </div>
          </div>
          <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-default">Tambah</a>
          <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Jam Ke</th>
                  <th>Uraian Kegiatan</th>

                </tr>
                </thead>
                <tbody>

                  

                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $show['htgl']; ?></td>
                  <td><?php echo $show['jam_ke']; ?></td>
                  <td><?php  echo $show['indikator_materi'] ?></td>
                </tr>
                </tr>
                     <?php } ?>
                </tfoot>
              </table>
       
            </div>
           
          </div>

           <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Tambah Jadwal KBM </h4></center>
              </div>
              <div class="modal-body">
                <div class="form-goup">
                  <label>Tanggal</label>
                  <input type="text" name="htgl" value="<?php echo date('d / M / y'); ?>"  class="form-control" readonly="">
                </div>

                <div class="form-goup">
                  <label>Hari</label>
                  <input type="text" name="id_hari" value="<?php echo DateIndo(date('D')); ?>" class="form-control" readonly="">
                </div>

                <div class="form-goup">
                  <label>Jam Ke</label>
                  <?php

                   $query_jam = $mysqli->getData("SELECT * from tbl_jadwal left join tbl_jam ON tbl_jadwal.id_jam=tbl_jam.id_jam where id_kelas='". $kelas."' and id_guru='".$guru."' ");
                  foreach ($query_jam as $qj) {
                  
                   ?>
                  <input type="text" name="id_jam" value="<?php echo $qj['jam_ke']  ?>" class="form-control" readonly="">
                <?php } ?>
                </div>

                 <div class="form-goup">
                  <label>Uraian Kegiatan</label>
                  <textarea class="form-control"></textarea>
                </div> 

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Simpan</button>
              </div>
            </div>