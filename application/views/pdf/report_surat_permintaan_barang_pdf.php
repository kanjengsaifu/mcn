<?PHP  
ob_start(); 
$base_url2 =  ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ?  "https" : "http");
$base_url2 .=  "://".$_SERVER['HTTP_HOST'];
$base_url2 .=  str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
?>
<style>
.gridth {
    background: #1793d1;
    vertical-align: middle;
    color : #FFF;
    text-align: center;
    height: 30px;
    font-size: 20px;
}
.gridtd {
    background: #FFFFF0;
    vertical-align: middle;
    font-size: 14px;
    height: 30px;
    padding-left: 5px;
    padding-right: 5px;
}
.grid {
    background: #FAEBD7;
    border-collapse: collapse;
}

.grid td, table th {
  border: 1px solid black;
}

.kolom_header{
    height: 20px;
}

</style>

<table style="width: 100%">
	<tr>
		<td style="width: 50%;text-align: left;">PT PRIMA ELEKTRIK POWER</td>
		<td style="width: 28%;text-align: left;"></td>
		<td style="width: 7%;text-align: right;border: 1px solid black;">Tipe</td>
		<td style="width: 15%;text-align: right;border: 1px solid black;">Bukti A</td>
	</tr>
	<tr>
		<td style="width: 50%;text-align: left;">Sumangko Wringin Anom Gresik</td>
		<td style="width: 28%;text-align: left;"></td>
		<td style="width: 7%;text-align: right;border: 1px solid black;">Tgl</td>
		<td style="width: 15%;text-align: right;border: 1px solid black;">9-11-2018</td>
	</tr>
	<tr>
		<td style="width: 50%;text-align: left;">Jawa Timur - Indonesia</td>
		<td style="width: 28%;text-align: left;"></td>
		<td style="width: 7%;text-align: right;border: 1px solid black;">No</td>
		<td style="width: 15%;text-align: right;border: 1px solid black;">0000001</td>
	</tr>
</table>


<br>
<table align="center">
    <tr>
        <td align="center">
            <h4 style="text-decoration: underline;">
                SURAT PERMINTAAN BARANG (SPB)
            </h4><br>
            <h5>00001/SPB/SIE_LISTRIK/2017</h5>
        </td>
    </tr>
</table>
<br>
<br>
<div style="width: 100%;padding-top: 10px;padding-bottom: 10px;padding-left:5px;border: 1px solid black;">
	<h5>Divisi : SIE LISTRIK</h5>
</div>
<br>
<div style="height: 300px;">
<table style="width: 100%;height: 300px;">
	
		<tr>
			<th style="width: 5%;padding: 5px 5px 5px 5px; border-top: 1px solid black; border-bottom: 1px solid black;border-right: none;border-left: none;">No</th>
			<th style="width: 30%;padding: 5px 5px 5px 5px; border-top: 1px solid black; border-bottom: 1px solid black;border-right: none;border-left: none;">Nama Barang</th>
			<th style="width: 15%;padding: 5px 5px 5px 5px; border-top: 1px solid black; border-bottom: 1px solid black;border-right: none;border-left: none;">Jumlah</th>
			<th style="width: 15%;padding: 5px 5px 5px 5px; border-top: 1px solid black; border-bottom: 1px solid black;border-right: none;border-left: none;">Satuan</th>
			<th style="width: 35%;padding: 5px 5px 5px 5px; border-top: 1px solid black; border-bottom: 1px solid black;border-right: none;border-left: none;">Keterangan</th>
		</tr>
	
		<tr>
			<td>1</td>
			<td>SIE_GUDANG/00178/2018</td>
			<td>30</td>
			<td>Kg</td>
			<td>0</td>
			
		</tr>
		<tr>
			<td>1</td>
			<td>SIE_GUDANG/00178/2018</td>
			<td>30</td>
			<td>Kg</td>
			<td>0</td>
			
		</tr>
		<tr>
			<td>1</td>
			<td>SIE_GUDANG/00178/2018</td>
			<td>30</td>
			<td>Kg</td>
			<td>701,000</td>
		</tr>
		<tr>
			<td>1</td>
			<td>SIE_GUDANG/00178/2018</td>
			<td>25</td>
			<td>Kg</td>
			<td>0</td>
		</tr>
		<tr>
			<td>1</td>
			<td>SIE_GUDANG/00178/2018</td>
			<td>25</td>
			<td>Kg</td>
			<td>4,201,000</td>
		</tr>
	
</table>
</div>


<table style="width: 100%;">
	<tr>
		<td style="width: 30%;"></td>
		<td style="width: 30%;text-align: center;">Menyetujui</td>
		<td style="width: 30%;text-align: center;">Yang Membuat</td>
	</tr>
</table>
<br>
<br>
<br>
<br>
<br>
<table style="width: 100%;">
	<tr>
		<td style="width: 30%;"></td>
		<td style="width: 30%;text-align: center;">(...................................)</td>
		<td style="width: 30%;text-align: center;">(...................................)</td>
	</tr>
</table>

<?PHP
    $width_custom = 14;
    $height_custom = 8.50;
    
    $content = ob_get_clean();
    $width_in_inches = $width_custom;
    $height_in_inches = $height_custom;
    $width_in_mm = $width_in_inches * 21.4;
    $height_in_mm = $height_in_inches * 19.8;
    $html2pdf = new HTML2PDF('P','A4','en');
    $html2pdf->pdf->SetTitle('Laporan Arus Kas');
    $html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('Laporan_arus_kas.pdf');
?>