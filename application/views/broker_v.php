<style type="text/css">
.recent_add td{
	background: #CDE69C;
}

#tes td {
	vertical-align: middle;
}

input[type=checkbox]:not(old),
input[type=radio   ]:not(old){
  width     : 2em;
  margin    : 0;
  padding   : 0;
  font-size : 1em;
  opacity   : 0;
}

input[type=checkbox]:not(old) + label,
input[type=radio   ]:not(old) + label{
  display      : inline-block;
  margin-left  : -2em;
  line-height  : 1.5em;
}

input[type=checkbox]:not(old) + label > span,
input[type=radio   ]:not(old) + label > span{
  display          : inline-block;
  width            : 0.875em;
  height           : 0.875em;
  margin           : 0.25em 0.5em 0.25em 0.25em;
  border           : 0.0625em solid rgb(192,192,192);
  border-radius    : 0.25em;
  background       : rgb(224,224,224);
  background-image :    -moz-linear-gradient(rgb(240,240,240),rgb(224,224,224));
  background-image :     -ms-linear-gradient(rgb(240,240,240),rgb(224,224,224));
  background-image :      -o-linear-gradient(rgb(240,240,240),rgb(224,224,224));
  background-image : -webkit-linear-gradient(rgb(240,240,240),rgb(224,224,224));
  background-image :         linear-gradient(rgb(240,240,240),rgb(224,224,224));
  vertical-align   : bottom;
}

input[type=checkbox]:not(old):checked + label > span,
input[type=radio   ]:not(old):checked + label > span{
  background-image :    -moz-linear-gradient(rgb(224,224,224),rgb(240,240,240));
  background-image :     -ms-linear-gradient(rgb(224,224,224),rgb(240,240,240));
  background-image :      -o-linear-gradient(rgb(224,224,224),rgb(240,240,240));
  background-image : -webkit-linear-gradient(rgb(224,224,224),rgb(240,240,240));
  background-image :         linear-gradient(rgb(224,224,224),rgb(240,240,240));
}

input[type=checkbox]:not(old):checked + label > span:before{
  content     : '✓';
  display     : block;
  width       : 1em;
  color       : rgb(153,204,102);
  font-size   : 0.875em;
  line-height : 1em;
  text-align  : center;
  text-shadow : 0 0 0.0714em rgb(115,153,77);
  font-weight : bold;
}

input[type=radio]:not(old):checked +  label > span > span{
  display          : block;
  width            : 0.5em;
  height           : 0.5em;
  margin           : 0.125em;
  border           : 0.0625em solid rgb(115,153,77);
  border-radius    : 0.125em;
  background       : rgb(153,204,102);
  background-image :    -moz-linear-gradient(rgb(179,217,140),rgb(153,204,102));
  background-image :     -ms-linear-gradient(rgb(179,217,140),rgb(153,204,102));
  background-image :      -o-linear-gradient(rgb(179,217,140),rgb(153,204,102));
  background-image : -webkit-linear-gradient(rgb(179,217,140),rgb(153,204,102));
  background-image :         linear-gradient(rgb(179,217,140),rgb(153,204,102));
}

</style>

<div class="row-fluid ">
	<div class="span12">
		<div class="primary-head">
			<h3 class="page-header"> <i class="icon-tags"></i>  Daftar Broker </h3>
			<button type="button" class="btn btn-info view_data" onclick="tambah_klik();" style="float: right;"> 
				<i class="icon-plus" style="color: #FFF; font-size: 16px; left: 0; position: relative; top: 2px;"></i> TAMBAH BROKER 
			</button>
		</div>
		<ul class="breadcrumb">
			<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
			<li><a href="#">Master Data</a><span class="divider"><i class="icon-angle-right"></i></span></li>
			<li class="active"> Broker </li>
		</ul>
	</div>
</div>


<div class="row-fluid view_data">
	<div class="span12">
		<div class="content-widgets light-gray">
			<div class="widget-container">
				<table class="stat-table table table-hover" id="data-table">
					<thead>
						<tr>
							<th align="center"> No </th>
							<th align="center"> Nama Broker</th>
							<th align="center"> Alamat Broker </th>
							<th align="center"> No. Telp </th>
							<th align="center"> Handphone</th>
							<th align="center"> Email</th>
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
							<td align="center" > <?=$no;?> </td>
							<td> <?=$row->NAMA;?> </td>
							<td> <?=$row->ALAMAT;?> </td>
							<td> <?=$row->TELP;?> </td>
							<td> <?=$row->HP;?> </td>
							<td> <?=$row->EMAIL;?> </td>
							<td align="center"  >						
								<div class="btn-group">
									<button style="padding: 2px 10px;" data-toggle="dropdown" class="btn btn-info dropdown-toggle"> Aksi <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" style="background-color:rgba(255, 255, 255, 1); min-width: 100px;">
										<li>
										<a onclick="ubah_data_pelanggan(<?=$row->ID;?>);" href="javascript:;">Ubah</a>
										</li>
										<li>
										<a onclick="$('#dialog-btn').click(); $('#id_hapus').val('<?=$row->ID;?>');" href="javascript:;">Hapus</a>
										</li>
									</ul>
								</div>
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
				<h3> <i class="icon-plus"></i> Tambah Data Broker </h3>
			</div>
			<div class="widget-container">
				<form class="form-horizontal" method="post" action="<?=base_url().$post_url;?>">
					<div class="control-group">
						<label class="control-label orang_show"> <b> Nama Broker </b> </label>
						<div class="controls">
							<input required type="text" placeholder="Nama Broker / Sales"  class="span12" value="" name="nama_broker">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> <b>NO. KTP (jika ada)</b> </label>
						<div class="controls">
							<input type="text"  class="span12" value="" name="ktp">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> <b>NPWP (jika ada)</b> </label>
						<div class="controls">
							<input type="text"  class="span12" value="" name="npwp">
						</div>
					</div>


					<div class="control-group">
						<label class="control-label"> <b> Alamat Broker </b> </label>
						<div class="controls">
							<textarea rows="3" class="span12" name="alamat"></textarea>
						</div>
					</div>


					<div class="control-group">
						<label class="control-label"> <b> No. Telp </b> </label>
						<div class="controls">
							<input type="text"  class="span12" value="" name="no_telp">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> <b> Handphone </b> </label>
						<div class="controls">
							<input type="text"  class="span12" value="" name="no_hp">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> <b> Email </b> </label>
						<div class="controls">
							<input type="text"  class="span12" value="" name="email">
						</div>
					</div>


					<div class="form-actions">
                        <input type="submit" class="btn btn-info" name="simpan" value="SIMPAN BROKER">
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
				<h3> <i class="icon-edit"></i> Ubah Data Broker </h3>
			</div>
			<div class="widget-container">
				<form class="form-horizontal" method="post" action="<?=base_url().$post_url;?>">

					<div class="control-group">
						<label class="control-label orang_show"> <b> Nama Broker </b> </label>
						<div class="controls">
							<input type="hidden" name="id_broker" value="">
							<input required type="text" placeholder="Nama Broker / Sales"  class="span12" value="" name="nama_broker_ed">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> <b>NO. KTP (jika ada)</b> </label>
						<div class="controls">
							<input type="text"  class="span12" value="" name="ktp_ed">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> <b>NPWP (jika ada)</b> </label>
						<div class="controls">
							<input type="text"  class="span12" value="" name="npwp_ed">
						</div>
					</div>


					<div class="control-group">
						<label class="control-label"> <b> Alamat Broker </b> </label>
						<div class="controls">
							<textarea rows="3" class="span12" name="alamat_ed"></textarea>
						</div>
					</div>


					<div class="control-group">
						<label class="control-label"> <b> No. Telp </b> </label>
						<div class="controls">
							<input type="text"  class="span12" value="" name="no_telp_ed">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> <b> Handphone </b> </label>
						<div class="controls">
							<input type="text"  class="span12" value="" name="no_hp_ed">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> <b> Email </b> </label>
						<div class="controls">
							<input type="text"  class="span12" value="" name="email_ed">
						</div>
					</div>

					<div class="form-actions">
                        <input type="submit" class="btn btn-info" name="edit" value="UBAH BROKER">
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


<!-- Modal Detail -->
<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail Pelanggan</h4>
      </div>
      <div class="modal-body">
        

		<div class="row-fluid">
			<div class="span6" style="font-size: 15px;">
				<address>
					<strong> Nama Pelanggan </strong><br>
					<font id="det_nama_pelanggan"> Dr. Aristo Jason </font> 
				</address>

				<address style="margin-top: 18px;">
					<strong> NPWP </strong><br>
					<font id="det_npwp"> Dr. Aristo Jason </font> 
				</address>

				<address style="margin-top: 18px;">
					<strong> No. Telepon </strong><br>
					<font id="det_no_telp"> Dr. Aristo Jason </font> 
				</address>

				<address style="margin-top: 18px;">
					<strong> No. HP </strong><br>
					<font id="det_no_hp"> Dr. Aristo Jason </font> 
				</address>

				<address style="margin-top: 18px;">
					<strong> Email </strong><br>
					<font id="det_email"> Dr. Aristo Jason </font> 
				</address>
			</div>
			<div class="span6" style="font-size: 15px;">

				<address>
					<strong> Alamat Penagihan </strong><br>
					<font id="det_alamat_tagih"> Dr. Aristo Jason </font> 
				</address>

				<address style="margin-top: 18px;">
					<strong> Alamat Pengiriman </strong><br>
					<font id="det_alamat_kirim"> Dr. Aristo Jason </font> 
				</address>

				<address style="margin-top: 18px;">
					<strong> Ditambahkan pada </strong><br>
					<font id="det_waktu"> Dr. Aristo Jason </font> 
				</address>

				<address style="margin-top: 18px;">
					<strong> Terakhir Diubah </strong><br>
					<font id="det_waktu_edit"> Dr. Aristo Jason </font> 
				</address>


			</div>
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

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
function cari_pelanggan(keyword) {
	$.ajax({
		url : '<?php echo base_url(); ?>pelanggan_c/cari_pelanggan',
		data : {keyword:keyword},
		type : "GET",
		dataType : "json",
		success : function(result){
			$isi = "";
			if(result.length == 0){
				$isi = "<tr><td colspan='6' style='text-align:center;'> <b> Tidak ada data yang ditampilkan </b> </td></tr>";
			} else {
				$.each(result, function(i, field){
				var approve = field.APPROVE;
				var approve_txt = "";
				var manage = "";
				if(approve == 0){
					approve_txt = "<font style='color:#e88a05; font-weight:bold;'>Menunggu Persetujuan</font>";
					manage = "<td style='text-align:center;'>"+
								"<button onclick='detail_pelanggan("+field.ID+");' data-toggle='modal' data-target='#modal_detail' type='button' class='btn btn-small btn-primary'> "+
								"<i class='icon-info-sign'></i> Detail "+
								"</button>"+
							 "</td>";
				} else if(approve == 1){
					approve_txt = "<font style='color:#e88a05; font-weight:bold;'>Menunggu Persetujuan Edit</font>";
					manage = "<td style='text-align:center;'>"+
								"<button onclick='detail_pelanggan("+field.ID+");' data-toggle='modal' data-target='#modal_detail' type='button' class='btn btn-small btn-primary'> "+
								"<i class='icon-info-sign'></i> Detail "+
								"</button>"+
							 "</td>";
				} else if(approve == 2){
					approve_txt = "<font style='color:#e88a05; font-weight:bold;'>Menunggu Persetujuan Hapus</font>";
					manage = "<td style='text-align:center;'>"+
								"<button onclick='detail_pelanggan("+field.ID+");' data-toggle='modal' data-target='#modal_detail' type='button' class='btn btn-small btn-primary'> "+
								"<i class='icon-info-sign'></i> Detail "+
								"</button>"+
							 "</td>";
				} else {
					approve_txt = "<font style='color:green; font-weight:bold;'>Approved</font>";
					manage = "<td style='text-align:center;'>"+
								"<div class='btn-group'>"+
									"<button data-toggle='dropdown' class='btn btn-info dropdown-toggle'> Aksi <span class='caret'></span></button>"+
										"<ul class='dropdown-menu' style='background-color:rgba(255, 255, 255, 1); min-width: 100px;'>"+
											"<li>"+
											"<a onclick='ubah_data_pelanggan("+field.ID+");' href='javascript:;'>Ubah</a>"+
											"</li>"+
											"<li>"+
											"<a onclick='hapus_klik("+field.ID+");' href='javascript:;'>Hapus</a>"+
											"</li>"+
										"</ul>"+
									"</div>"+

									"&nbsp; <button onclick='detail_pelanggan("+field.ID+");' data-toggle='modal' data-target='#modal_detail' type='button' class='btn btn-small btn-primary'> "+
									"<i class='icon-info-sign'></i> Detail "+
									"</button>"+
							"</td>";
				}
				$isi += 
					"<tr>"+
						"<td style='text-align:center;'>"+parseInt(i+1)+"</td>"+
						"<td>"+field.NAMA_PELANGGAN+"</td>"+
						"<td>"+field.ALAMAT_TAGIH+"</td>"+
						"<td>"+field.ALAMAT_KIRIM+"</td>"+
						"<td style='text-align:center;'>"+approve_txt+"</td>"+
						manage+
					"</tr>";
				});
			}

			$('#tes').html($isi);
		}
	});
}

function ubah_data_pelanggan(id){
	$('#popup_load').show();
	$.ajax({
		url : '<?php echo base_url(); ?>broker_c/cari_pelanggan_by_id',
		data : {id:id},
		type : "GET",
		dataType : "json",
		success : function(result){
			$('#popup_load').hide();

			$('input[name="id_broker"]').val(result.ID);
			$('input[name="nama_broker_ed"]').val(result.NAMA);
			$('input[name="ktp_ed"]').val(result.NO_KTP);
			$('input[name="npwp_ed"]').val(result.NO_NPWP);
			$('textarea[name="alamat_ed"]').val(result.ALAMAT);
			$('input[name="no_telp_ed"]').val(result.TELP);
			$('input[name="no_hp_ed"]').val(result.HP);
			$('input[name="email_ed"]').val(result.EMAIL);

	        //$("#kategori_ed").chosen("destroy");

	        $('.view_data').hide();
	        $('#edit_data').fadeIn('slow');
		}
	});
}

function detail_pelanggan(id){
	$('#popup_load').show();
	$.ajax({
		url : '<?php echo base_url(); ?>pelanggan_c/cari_pelanggan_by_id',
		data : {id:id},
		type : "GET",
		dataType : "json",
		success : function(result){
			$('#popup_load').hide();
			$('#det_nama_pelanggan').html(result.NAMA_PELANGGAN);
			$('#det_npwp').html(result.NPWP);
			$('#det_no_telp').html(result.NO_TELP);
			$('#det_no_hp').html(result.NO_HP);
			$('#det_email').html(result.EMAIL);
			
			$('#det_alamat_tagih').html(result.ALAMAT_TAGIH);
			$('#det_alamat_kirim').html(result.ALAMAT_KIRIM);
			$('#det_waktu').html(result.WAKTU);
			$('#det_waktu_edit').html(result.WAKTU_EDIT);


		}
	});
}

function tambah_klik(){
	$('.view_data').hide();
	$('#add_data').fadeIn('slow');
}

function batal_klik(){
	$('#add_data').hide();
	$('.view_data').fadeIn('slow');
}

function batal_edit_klik(){
	$('#edit_data').hide();
	$('.view_data').fadeIn('slow');
}

function hapus_klik(id){
	$('#dialog-btn').click(); 
	$('#id_hapus').val(id);
}


function isfilter(){

	if($("#perorang").is(':checked')){
	    $('.orang_show').show(); 
	    $('.usaha_show').hide(); 
	} 

	if($("#perusaha").is(':checked')){
	    $('.orang_show').hide(); 
	    $('.usaha_show').show();  
	} 
}

function isfilter_ed(){
	if($("#perorang_ed").is(':checked')){
	    $('.orang_show_ed').show(); 
	    $('.usaha_show_ed').hide(); 
	} 

	if($("#perusaha_ed").is(':checked')){
	    $('.orang_show_ed').hide(); 
	    $('.usaha_show_ed').show();  
	} 
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