<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h3>Data Kategori</h3>
                    <a style="margin-bottom: 10px;" href="#tambah" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                    <table>
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th style="text-align:center;">Nama Kategori</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                        <?php
                        $no=1;
                            foreach ($datakat as $l) {
                                echo '<tr>                          
                            <td style="text-align:center;">'.$no.'</td>
                            <td style="text-align:center;">'.$l->nama_kat.'</td>
                            <td style="text-align:center;">
                            <a class="btn btn-primary btn-md" onclick="detil_kategori('.$l->id_kat.')" data-toggle="modal" data-target="#edit"> Edit </a>
                            <a class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin ingin menghapus?\')" href="'.base_url().'index.php/Kategori/delete/'.$l->id_kat.'"> Hapus </a>
                            </td>
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
                                        <h4 class="modal-title">Tambah Kategori</h4>
                                        <div class="modal-close-area modal-close-df">     
                                        </div>
                                    </div>
                                    <form action="<?php echo base_url('index.php/Kategori/create'); ?>" method="post" >
                                    <center><div class="modal-body">
                                    <div class="">
                                    <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kat">
                                    <br><div class="" style="text-align:right; margin-right:45px; margin-bottom:10px;">
                                        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
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
                                <form action="<?php echo base_url('index.php/Kategori/edit'); ?>" method="post" >
                                    <div class="modal-header header-color-modal bg-color-4">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close" style="color: black;"></i></a>
                                        <h4 class="modal-title">Ubah Kategori</h4>
                                        <div class="modal-close-area modal-close-df">     
                                        </div>
                                    </div>
                                    <center><div class="modal-body">
                                    <input type="hidden" name="ubah_id_kat" id="ubah_id_kat">
                                    <input type="text" class="form-control" id="ubah_nama_kat" name="ubah_nama_kat"x>
                                    <br><div class="" style="text-align:right; margin-right:45px; margin-bottom:10px;">
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
        function detil_kategori(id_kat) {
      $.getJSON("http://localhost/rest-api/index.php/DetilKategori/"+id_kat, function(data){
			$("#ubah_id_kat").val(data.id_kat);
            $("#ubah_nama_kat").val(data.nama_kat);
          });
        }
        </script>