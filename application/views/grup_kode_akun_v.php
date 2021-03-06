<style type="text/css">
.recent_add td{
	background: #CDE69C;
}

#tes td {
	vertical-align: middle;
}
</style>

<div class="row-fluid ">
	<div class="span12">
		<div class="primary-head">
			<h3 class="page-header"> <i class="icon-bookmark"></i>  Grup Kode Akun </h3>

		</div>
		<ul class="breadcrumb">
			<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
			<li><a href="#">Master Data</a><span class="divider"><i class="icon-angle-right"></i></span></li>
			<li class="active"> Grup Kode Akun </li>
		</ul>
	</div>
</div>

<?PHP if($msg == 11){ ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<i class="icon-ok-sign"></i><strong>Sukses!</strong> Pengubahan Grup Akun telah diajukan. Mohon tunggu persetujuan atasan.
</div>
<?PHP } ?>

<?PHP if($msg == 22){ ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<i class="icon-ok-sign"></i><strong>Sukses!</strong> Penghapusan Grup Akun telah diajukan. Mohon tunggu persetujuan atasan.
</div>
<?PHP } ?>

<?PHP if($msg == 33){ ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<i class="icon-ok-sign"></i><strong>Sukses!</strong> Grup Akun telah diajukan. Mohon tunggu persetujuan atasan.
</div>
<?PHP } ?>

<div class="row-fluid" id="view_data">
	<div class="span12">
		<button type="button" class="btn btn-block btn-info" onclick="tambah_klik();"> 
			<i class="icon-plus" style="color: #FFF; font-size: 16px;"></i> TAMBAH GRUP AKUN
		</button>
		<br>
		<div class="content-widgets light-gray">
			<div class="widget-container">
				<table class="responsive table table-striped table-bordered" id="data-table">
					<thead>
						<tr>
							<th align="center"> NO </th>
							<th align="center"> MAIN GRUP </th>
							<th align="center"> KODE GRUP </th>
							<th align="center"> NAMA GRUP </th>
							<th align="center"> STATUS </th>							
							<th align="center"> Aksi </th>
						</tr>						
					</thead>
					<tbody id="tes">
						<?PHP 
						$no = 0;
						foreach ($dt as $key => $row) { 
							$no++;
						?>
						<tr>
							<td align="center" style="text-align: center;"> <?=$no;?> </td>
							<td align="left" > <?=$row->GRUP;?> </td>
							<td> <?=$row->KODE_GRUP;?> </td>
							<td> <?=$row->NAMA_GRUP;?> </td>

							<td>
								<?PHP if($row->APPROVE == 0){
									echo "<font style='color:#e88a05; font-weight:bold;'>Menunggu Persetujuan</font>";
								} else if($row->APPROVE == 1){
									echo "<font style='color:#e88a05; font-weight:bold;'>Menunggu Persetujuan Edit</font>";
								} else if($row->APPROVE == 2){
									echo "<font style='color:#e88a05; font-weight:bold;'>Menunggu Persetujuan Hapus</font>";
								} else {
									echo "<font style='color:green; font-weight:bold;'>Approved</font>";
								} ?>
							</td>

							<td align="center" style="text-align: center;">
							<?PHP if($row->APPROVE == 3){?> 															
								<button style="padding: 2px 10px;"  onclick="ubah_data_produk(<?=$row->ID;?>);" type="button" class="btn btn-small btn-warning"> 
								Ubah 
								</button>
								<button style="padding: 2px 10px;"  onclick="$('#dialog-btn').click(); $('#id_hapus').val('<?=$row->ID;?>');" type="button" class="btn btn-small btn-danger"> 
								Hapus
								</button>
							<?PHP } else { ?>
								<?PHP if($user->LEVEL == "MANAGER"){ ?>
									<?PHP $appr = $this->master_model_m->get_data_persetujuan('kode_grup', $row->ID); ?>
									<div class="btn-group">
										<button style="padding: 2px 10px;"  data-toggle="dropdown" class="btn btn-info dropdown-toggle"> Authorize <span class="caret"></span>
										</button>
										<ul class="dropdown-menu" style="background-color:rgba(255, 255, 255, 1); min-width: 120px;">
											<li>
											<a href="javascript:;" onclick="persetujuan('<?=$appr->ID;?>', 'SETUJU', '<?=$appr->ITEM;?>', '<?=$appr->ID_ITEM;?>', '<?=$appr->JENIS;?>');">Setuju</a>
											</li>
											<li>
											<a href="javascript:;" onclick="persetujuan('<?=$appr->ID;?>', 'TIDAK SETUJU', '<?=$appr->ITEM;?>', '<?=$appr->ID_ITEM;?>', '<?=$appr->JENIS;?>');">Tidak Setuju</a>
											</li>
										</ul>
									</div>
								<?PHP } else {
									echo "-";
								} ?>
							<?PHP } ?>

							</td>
						</tr>
						<?PHP } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row-fluid" id="add_data" style="display:none;">
	<div class="span12">
		<div class="content-widgets light-gray">
			<div class="widget-head blue">
				<h3> <i class="icon-plus"></i> Tambah Grup Akun unit <b><?=strtoupper($user->NAMA_UNIT);?></b> </h3>
			</div>
			<div class="widget-container">
				<form class="form-horizontal" method="post" action="<?=base_url().$post_url;?>">
					<div class="control-group">
						<label class="control-label"> MAIN GRUP </label>
						<div class="controls">
							<select required data-placeholder="Pilih main grup..." class="chzn-select" tabindex="2" style="width:300px;" name="grup">
								<option value=""></option>
								<option value="ASET LANCAR">ASET LANCAR</option>
								<option value="ASET TIDAK LANCAR">ASET TIDAK LANCAR</option>
								<option value="KEWAJIBAN LANCAR">KEWAJIBAN LANCAR</option>
								<option value="KEWAJIBAN LAIN LAIN">KEWAJIBAN LAIN LAIN</option>
								<option value="EKUITAS">EKUITAS</option>
								<option value="PENDAPATAN">PENDAPATAN</option>
								<option value="BIAYA">BEBAN / BIAYA</option>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> KODE GRUP </label>
						<div class="controls">
							<input required type="text" class="span2" value="" name="kode_grup" style="font-size: 14px;">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> NAMA GRUP </label>
						<div class="controls">
							<input required type="text"  class="span6" value="" name="nama_grup" style="font-size: 14px;">
						</div>
					</div>

					<div class="form-actions">
						<?PHP if($user->LEVEL == "USER"){ ?>
						<input type="submit" class="btn btn-info" name="simpan" value="AJUKAN KODE GRUP">
						<?PHP } else { ?>
						<input type="submit" class="btn btn-info" name="simpan" value="SIMPAN KODE GRUP">
						<?PHP } ?>
						<button type="button" onclick="batal_klik();" class="btn"> BATAL </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row-fluid" id="edit_data" style="display:none;">
	<div class="span12">
		<div class="content-widgets light-gray">
			<div class="widget-head blue">
				<h3> <i class="icon-edit"></i> Ubah Grup Kode Akun </h3>
			</div>
			<div class="widget-container">
				<form class="form-horizontal" method="post" action="<?=base_url().$post_url;?>">
					<div class="control-group">
						<label class="control-label">  MAIN GRUP  </label>
						<div class="controls">
							<input readonly type="text" class="span4" value="" name="grup_ed" id="grup_ed" >
							<input type="hidden" class="span12" value="" name="id_grup" id="id_grup" >
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> KODE GRUP </label>
						<div class="controls">
							<input readonly type="text" class="span2" value="" name="kode_grup_ed" id="kode_grup_ed" style="font-size: 14px;">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> NAMA GRUP </label>
						<div class="controls">
							<input required type="text"  class="span6" value="" name="nama_grup_ed" id="nama_grup_ed" style="font-size: 14px;">
						</div>
					</div>

					<div class="form-actions">
						<?PHP if($user->LEVEL == "USER"){ ?>
						<input type="submit" class="btn btn-info" name="edit" value="AJUKAN PENGUBAHAN">
						<?PHP } else { ?>
						<input type="submit" class="btn btn-info" name="edit" value="UBAH KODE GRUP">
						<?PHP } ?>
						<button type="button" onclick="batal_edit_klik();" class="btn"> BATAL </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- HAPUS MODAL -->
<a id="dialog-btn" href="javascript:;" class="cd-popup-trigger" style="display:none;">View Pop-up</a>
<div class="cd-popup" role="alert">
    <div class="cd-popup-container">

        <form id="delete" method="post" action="<?=base_url().$post_url;?>">
            <input type="hidden" name="id_hapus" id="id_hapus" value="" />
        </form>   
         
        <p>Apakah anda yakin ingin mengajukan penghapusan data ini? </p>
        <ul class="cd-buttons">            
            <li><a href="javascript:;" onclick="$('#delete').submit();">Ya</a></li>
            <li><a onclick="$('.cd-popup-close').click(); $('#id_hapus').val('');" href="javascript:;">Tidak</a></li>
        </ul>
        <a href="#0" onclick="$('#id_hapus').val('');" class="cd-popup-close img-replace">Close</a>
    </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->
<!-- END HAPUS MODAL -->


<!-- MODAL SETUJU / TIDAK -->
<button id="appr_btn" data-toggle="modal" data-target="#approval_modal" class="btn btn-warning" style="display: none;">a</button>
<div id="approval_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
            <div class="row-fluid">
                <div class="span12" style="font-size: 15px;">
                    <div class="control-group" style="margin-left: 10px;">
                        <label class="control-label"> <b style="font-size: 14px;"> AKSI </b> </label>
                        <div class="controls">
                            <input type="text" style="font-weight: bold;" class="span12" value="" readonly name="apr_aksi" id="apr_aksi">
                            <input type="hidden" class="span12" value="" readonly name="id_persetujuan" id="id_persetujuan">
                            <input type="hidden" class="span12" value="" readonly name="item" id="item">
                            <input type="hidden" class="span12" value="" readonly name="id_item" id="id_item">
                            <input type="hidden" class="span12" value="" readonly name="jenis" id="jenis">
                        </div>
                    </div>

                    <div class="control-group" style="margin-left: 10px;">
                        <label class="control-label"> <b style="font-size: 14px;"> ALASAN </b> </label>
                        <div class="controls">
                            <textarea rows="3" id="apr_alasan" name="apr_alasan" style="resize:none; height: 60px; width: 400px;"></textarea>
                        </div>
                    </div> 
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="save_persetujuan();" class="btn btn-success">Terapkan</button>
        <button type="button" id="tutup_modal_appr" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
function ubah_data_produk(id){
	$('#popup_load').show();
	$.ajax({
		url : '<?php echo base_url(); ?>grup_kode_akun_c/cari_grup_by_id',
		data : {id:id},
		type : "GET",
		dataType : "json",
		success : function(result){
			$('#popup_load').hide();
			$('#id_grup').val(result.ID);
			$('#grup_ed').val(result.GRUP);
			$('#kode_grup_ed').val(result.KODE_GRUP);
			$('#nama_grup_ed').val(result.NAMA_GRUP);

	        $('#view_data').hide();
	        $('#edit_data').fadeIn('slow');
		}
	});
}

function tambah_klik(){
	$('#view_data').hide();
	$('#add_data').fadeIn('slow');
}

function batal_klik(){
	$('#add_data').hide();
	$('#view_data').fadeIn('slow');
}

function batal_edit_klik(){
	$('#edit_data').hide();
	$('#view_data').fadeIn('slow');
}

function hapus_klik(id){
	$('#dialog-btn').click(); 
	$('#id_hapus').val(id);
}

function persetujuan(id, act, item, id_item, jenis){
        
    $('#apr_aksi').val(act);
    $('#id_persetujuan').val(id);
    $('#item').val(item);
    $('#id_item').val(id_item);
    $('#jenis').val(jenis);
    $('#apr_alasan').val('');

    $('#appr_btn').click();
}

function save_persetujuan(){

    var apr_aksi = $('#apr_aksi').val();
    var id_persetujuan = $('#id_persetujuan').val();
    var item = $('#item').val();
    var id_item = $('#id_item').val();
    var jenis = $('#jenis').val();
    var apr_alasan = $('#apr_alasan').val();

    var jml_persetujuan = $('#jml_appr_'+item).html();
    var jml_now = parseFloat(jml_persetujuan) - 1;

    $('#appr_'+id_persetujuan).hide();
    if(jml_now == 0){
        var isi =  '<div class="post_list clearfix">'+
                        '<div class="post_block clearfix">'+  
                            '<h4>Tidak ada pengajuan untuk saat ini</h4>'+
                        '</div>'+
                    '</div>';
         $('#'+item).html(isi);
    }
    $('#jml_appr_'+item).html(jml_now);

    $.ajax({
        type:"POST",
        url: '<?=base_url();?>beranda_c/simpan_persetujuan',
        data: {
            apr_aksi : apr_aksi,
            id_persetujuan : id_persetujuan,
            item : item,
            id_item : id_item,
            jenis : jenis,
            apr_alasan : apr_alasan,
        },
        dataType : 'json',
        success: function(res){
            window.location.reload();
        }
    });
}

</script>