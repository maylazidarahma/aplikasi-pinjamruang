<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h3>Data Ruang</h3>
                   
                    <a style="margin-bottom: 10px;" href="#tambah" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                    <br>
                    <table>
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th style="text-align:center;">Nama Ruang</th>
                            <th style="text-align:center;">Gambar Ruang</th>
                            <th style="text-align:center;">Kategori</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                        <?php
                        $no=1;
                            foreach ($dataruang as $l) {
                                echo '<tr>                          
                            <td style="text-align:center;">'.$no.'</td>
                            <td style="text-align:center;">'.$l->nama_ruang.'</td>
                            <td style="text-align:center;"><img src="http://localhost/Sapra/assets/images/ruang/'.$l->gambar.'"></td>
                            <td style="text-align:center;">'.$l->nama_kat.'</td>
                            <td style="text-align:center;">'.$l->status_pinjam.'</td>
                            <td style="text-align:center;">
                            <a class="btn btn-primary btn-md" onclick="detil_ruang('.$l->id_ruang.')" data-toggle="modal" data-target="#edit"> Edit </a>
                            <a class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin ingin menghapus?\')" href="'.base_url().'index.php/Ruang/delete/'.$l->id_ruang.'"> Hapus </a></td>
                            <tr>';
                            $no++;
                            }  
                            foreach($dataruang2 as $l){
                                echo '<tr>                          
                                <td style="text-align:center;">'.$no.'</td>
                                <td style="text-align:center;">'.$l->nama_ruang.'</td>
                                <td style="text-align:center;"><img src="http://localhost/Sapra/assets/images/ruang/'.$l->gambar.'"></td>
                                <td style="text-align:center;">'.$l->nama_kat.'</td>
                                <td style="text-align:center;">'.$l->status_pinjam.'</td>
                                <td style="text-align:center;">
                                <a class="btn btn-primary btn-md" onclick="detil_ruang('.$l->id_ruang.')" data-toggle="modal" data-target="#edit">Edit</a>
                                <a class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin ingin menghapus?\')" href="'.base_url().'index.php/Ruang/delete/'.$l->id_ruang.'"> Hapus </a></td>
                                <tr>';
                                $no++;
                            } 

                        ?>
                    </table>
                    <div id="tambah" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" data-toggle="modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-4">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close" style="color: black;"></i></a>
                                        <h4 class="modal-title">Tambah Ruang</h4>
                                        <div class="modal-close-area modal-close-df">     
                                        </div>
                                    </div>
                                    <form action="<?php echo base_url('index.php/Ruang/create'); ?>" method="post" enctype="multipart/form-data" >
                                    <center><div class="modal-body">
                                    <input type="text" class="form-control" placeholder="Nama Ruang" name="nama_ruang" >
                                    <input type="file" class="form-control" placeholder="Gambar" name="gambar" >
                                    <input type="hidden" class="form-control" value="tersedia" name="status_pinjam">
                                    <select name="id_kat" class="form-control" >
					                    <?php
						                    foreach ($datakat as $l) {
							                echo '
								            <option value="'.$l->id_kat.'">'.$l->nama_kat.'</option>
			                                ';
						                    }
					                    ?>	        		
                                    </select>
                                    <select name="id_detil" class="form-control" >
					                    <?php
						                    foreach ($datadetil as $l) {
							                echo '
								            <option value="'.$l->id_detil.'">meja:'.$l->jumlah_meja.', kursi:'.$l->jumlah_kursi.', proyektor:'.$l->proyektor.', pendingin ruang:'.$l->pendingin_ruang.'</option>
			                                ';
						                    }
					                    ?>	        		
                                    </select>                                    
                                    <br>
                                    <div class="" style="text-align:right; margin-right:45px; margin-bottom:10px;">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                                    </div>
                                    </div>
                                    </div></center>
                        </form>
                                </div>
                            </div>
                        </div>
                        <div id="edit" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" data-toggle="modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form action="<?php echo base_url('index.php/Ruang/edit'); ?>" method="post" enctype="multipart/form-data" >
                                    <div class="modal-header header-color-modal bg-color-4">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close" style="color: black;"></i></a>
                                        <h4 class="modal-title">Ubah Ruang</h4>
                                        <div class="modal-close-area modal-close-df">     
                                        </div>
                                    </div>
                                    <center><div class="modal-body">
                                    <input type="hidden" class="form-control" id="ubah_id_ruang" placeholder="Nama Ruang" name="id_ruang" >
                                    <input type="text" class="form-control" id="ubah_nama_ruang" placeholder="Nama Ruang" name="nama_ruang" >
                                    <div id="img"></div>
                                    <input type="file" class="form-control" id="ubah_data_gambar" placeholder="Gambar" name="gambar" >
                                    <input type="hidden" class="form-control" id="ubah_status_pinjam" value="tersedia" name="status_pinjam" >
                                    <select name="id_kat" class="form-control" id="ubah_id_kat" >
					                    <?php
						                    foreach ($datakat as $l) {
							                echo '
								            <option value="'.$l->id_kat.'">'.$l->nama_kat.'</option>
			                                ';
						                    }
					                    ?>	        		
                                    </select>
                                    <select name="id_detil" class="form-control" id="id_detil" >
					                    <?php
						                    foreach ($datadetil as $l) {
							                echo '
								            <option value="'.$l->id_detil.'">meja:'.$l->jumlah_meja.', kursi:'.$l->jumlah_kursi.', proyektor:'.$l->proyektor.', pendingin ruang:'.$l->pendingin_ruang.'</option>
			                                ';
						                    }
					                    ?>	        		
                                    </select>            
                                    <br>
                                    <div class="" style="text-align:right; margin-right:45px; margin-bottom:10px;">
                                        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">

                                    </div>
                                    </div></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php if($this->session->flashdata('hasil')!=null): ?>
			        <div class= "alert alert-success"><?= $this->session->flashdata('hasil');?></div>
			        <?php endif?>
                    <div class="custom-pagination">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        function detil_ruang(id_ruang) {
      $.getJSON("http://localhost/rest-api/index.php/DetilRuang/"+id_ruang, function(data){
			$("#ubah_id_ruang").val(data['0'].id_ruang);
            $("#ubah_nama_ruang").val(data['0'].nama_ruang);
            $("#img").html(
			'<img src="http://localhost/Sapra/assets/images/ruang/'+data['0'].gambar+'" style="width:20%">');
            $("#ubah_data_gambar").val(data['0'].gambar);
            $("#ubah_id_kat").val(data['0'].id_kat);
            $("#ubah_id_detil").val(data['0'].id_detil);
          });
        }
        </script>