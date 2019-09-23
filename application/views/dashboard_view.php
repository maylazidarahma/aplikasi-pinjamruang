<?php
if($this->session->userdata('level')=='siswa'){
    ?>
<div class="section-admin container-fluid">
    <div class="row admin text-center">
        <div class="col-md-12">
            <div class="row">
                <?php
                foreach($dataruang as $l){?>
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="admin-content progrebar-ctn res-mg-t-15">
                        
                        <img class="room" src="http://localhost/Sapra/assets/images/ruang/<?php echo $l->gambar?>">
                        <div class="float-left">
                            <h4><?php echo $l->nama_ruang?></h4>
                        </div>
                        <div class="text-right">
                        <button class="broom"><a href="#detil_ruang" onclick="detil_ruang(<?php echo $l->id_ruang?>)" data-toggle="modal">Lihat detail</a></button>
                        </div>
                        
                    </div>

                        <div id="detil_ruang" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" data-toggle="modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-4">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close" style="color: black;" ></i></a>
                                        <h4 class="modal-title">Detail Ruang</h4>
                                        <div class="modal-close-area modal-close-df">
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                    <div class="row">
					<div class="col-md-6">
						<div id="gambar"></div>
					</div>
					<div class="col-md-4">
						<div id="deskripsi"></div>
						<br>
						<div id="btn"></div>
						<div id="pesan"></div>
					</div>
				</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php 
} else{?>
    <div class="section-admin container-fluid"> 
    <div class="row admin text-center">
        <div class="col-md-12">
            <div class="row" >
                <?php
                $no = 0;
                foreach($count as $l){
                $nama = ['Ruang', 'User', 'Peminjaman'];
                $icon = ['fa fa-home', 'fa fa-user', 'fa fa-line-chart'];
                    ?>
                 <div class="col-lg-4 col-md-3" style="padding : 100px 20px 0px 20px;">
                    <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                    <i class="<?php echo $icon[$no]?>"></i>
                    <h4 class="text-center"> Jumlah <?php echo $nama[$no];?></h4>
                    <p class="text-center"><?php echo $l->jml;?></p></div>
                </div>
            <?php
            $no++;
                }
                ?>
               
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<script type="text/javascript">
function detil_ruang(id_ruang){
	$.getJSON("http://localhost/rest-api/index.php/DetilRuang/"+id_ruang,function(data){
		$("#gambar").html(
			'<img src="http://localhost/Sapra/assets/images/ruang/'+data['0'].gambar+'" style="width:100%">');
		$("#deskripsi").html(
			'<table class="table table-hover table-stripped">'+
			'<tr><td>Jumlah Kursi</td><td>'+data['0'].jumlah_kursi+'</td></tr>'+
			'<tr><td>Jumlah Meja</td><td>'+data['0'].jumlah_meja+'</td></tr>'+
            '<tr><td>Proyektor</td><td>'+data['0'].proyektor+'</td></tr>'+
            '<tr><td>Pendingin Ruangan</td><td>'+data['0'].pendingin_ruang+'</td></tr>'+
			'</table>');
		$("#btn").html('<a href="<?=base_url()?>index.php/peminjaman/tampil/'+data['0'].id_ruang+'" class="btn btn-danger">PINJAM</a>');
	});
}
</script>