<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Daftar Pajak Masukan yang tidak dapat Dikreditkan atau yang mendapat Fasilitas</title>
<style type="text/css">
<!--
.style1 {
	font-size: 10px
}

.style3 {font-size: 12px}
.style4 {
	font-size: 15px;
	font-weight: bold;
}

table{
	border : 1px #000;
	 padding: 0 0.5em;
	 border-collapse: collapse;
	 margin:0 auto;
}
tr{
	border:1px solid #999;
	 padding: 0 0.5em;
}
td{
	border:1px solid #999;
	 padding: 0 0.5em;
}

.bgth{
	background-color: #c1ff98;
}
.nonpwp{
	margin-left:5px;
	float:left;
}

.npwp{
	margin-left:0px;
	float:left;
}
.jumlah{
	font-size:11px;
}

-->
</style>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="6"><div align="center" class="style4">DAFTAR PAJAK MASUKAN YANG DAPAT DIKREDITKAN ATAS PEROLEHAN BKP/JKP DALAM NEGERI</div></td>
    <td colspan="3"><div align="center"><b>FORMULIR 1111 B2</b><br />
    <font size="2">(Bila tidak ada transaksi tidak perlu dilampirkan)</font></div></td>
  </tr>
  
  <tr>
    <td colspan="4"><font size="2">NAMA PKP : PT. SYDECO</font> </td>

	
    <td width="12%">&nbsp;</td>
    <td colspan="4"><font size="2">MASA : </font> &nbsp; &nbsp;&nbsp;  sc  &nbsp; &nbsp;&nbsp;  - &nbsp; &nbsp;&nbsp;  (dd-mm-yyyy)</td>
  </tr>
  
  <tr>
    <td colspan="4">
		<div class="npwp">
			<font size="2">NPWP : </font>
		</div>  
		<div class="nonpwp">31.729.429.6 - 542 . 0000</div>	
	</td>
    
	<td>&nbsp;</td>
    <td colspan="4">
		<font size="2">Pembetulan Ke : </font> 0 ( Nol ) 
	</td>
  </tr>

  <tr>
    <td width="4%" rowspan="2" class="bgth">No</td>
    <td width="13%" rowspan="2" valign="top" class="bgth">
		<div align="center">
			<font size="2">Nama Penjual BKP/ BKP Tidak Berwujud/Pemberi JKP</font>
		</div>
	</td>
    <td width="11%" rowspan="2" class="bgth">
		<div align="center">NPWP</div>
	</td>
    <td colspan="2" valign="top" class="bgth">
		<div align="center">
			<font size="2"> Faktur Pajak/Dokumen Tertentu/ Nota Retur/Nota Pembatalan </font>
		</div>
	</td>
    <td width="12%" rowspan="2" valign="top" class="bgth">
		<div align="center">DPP<br />
			(Rupiah)
		</div>
	</td>
    <td width="12%" rowspan="2" valign="top" class="bgth">
		<div align="center">PPN<br />
			(Rupiah)
		</div>
	</td>
    <td width="12%" rowspan="2" valign="top" class="bgth">
		<div align="center">PPnBM<br />
			(Rupiah)
		</div>
	</td>
    <td width="13%" rowspan="2" valign="top" class="bgth">
		<div align="center">
			<font size="2">Kode dan No. Seri Faktur Pajak Yang Diganti/Direktur</font>
		</div>
	</td>
  </tr>
  
  <tr>
    <td width="13%" valign="top" class="bgth">
		<div align="center">Kode dan Nomor Seri</div>
	</td>
    <td valign="top" class="bgth" align="center">Tanggal (dd-mm-yyy)</td>
  </tr>


@foreach ($faktur as $data)  

  <tr>
    <td><div align="center">1</div></td>
    <td> <font size="2"> {{{ $data->nama_pembeli }}}	</font></td>
    <td> <font size="2"> {{{ $data->npwp }}}	</font></td>
    <td> <font size="2"> {{{ $data->no_faktur }}}	</font></td>
    <td> &nbsp;</td>
    <td> <font size="2"> {{{ $data->penjualan }}} </font></td>
    <td> <font size="2"> {{{ $data->ppn }}}</td>
    <td> &nbsp;</td>
    <td> &nbsp;</td>
  </tr>

@endforeach

  <tr>
    <td colspan="4"><div align="center"><strong><span class="jumlah">JUMLAH</span></strong></div></td>
    <td><div align="right"><strong><span class="jumlah">(B.2)</span></strong></div></td>
    <td><font size="2"> {{ $totalpenjualan}} </font></td>
    <td><font size="2"> {{ $totalppn}} </font></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

    <script>
      window.print();
    </script>
	
	
</body>
</html>
