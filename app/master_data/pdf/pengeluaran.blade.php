<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Data Pengeluaran</title>
    <link href="{{ asset('css/pdf.css') }}" rel="stylesheet">
    <link href="{{ asset('css/grid.css') }}" rel="stylesheet">
  </head>
  <body>
    <header>
      <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
          <?php
            $logo = ($corp->logo) ?: 'blank.png';
          ?>
          <img src="{{ asset('foto/'.$logo) }}" alt="" id="logo" class="logo" />
        </div>

        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 text-center">
          <h3>{{{ $corp->nama }}}</h3>
          <h3>DATA PENGELUARAN</h3>
          <h5>{{{ $corp->alamat }}}</h5>
        </div>
      </div>
    </header>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-center">Tanggal</th>
          <th class="text-center">Pelanggan</th>
          <th class="text-center">Kode</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Satuan</th>
          <th class="text-center">Jumlah</th>
          <th class="text-center">Harga</th>
          <th class="text-center">Total</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($pengeluaran as $data)
          <tr>
            <td class="text-center">
              {{{ date('d-m-Y', strtotime($data->created_at)) }}}
            </td>
            <td>
              {{{ $data->pelanggan }}}
            </td>
            <td class="text-center">
              {{{ $data->barang }}}
            </td>
            <td>
              {{{ $data->nama }}}
            </td>
            <td class="text-center">
              {{{ $data->satuan }}}
            </td>
            <td class="text-center">
              {{{ number_format($data->jumlah, null, ',', '.') }}}
            </td>
            <td class="text-center">
              {{{ number_format($data->jual, null, ',', '.') }}}
            </td>
            <td class="text-center">
              {{{ number_format(($data->jumlah * $data->jual), null, ',', '.') }}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <script>
      window.print();
    </script>
  </body>
</html>