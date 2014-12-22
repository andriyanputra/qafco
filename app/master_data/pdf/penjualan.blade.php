<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Faktur Penjualan</title>
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
          <h3>FAKTUR PENJUALAN</h3>
          <h5>{{{ $corp->alamat }}}</h5>
        </div>
      </div>
    </header>

    <div class="row" id="data-faktur">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <p>Tanggal : {{ date('d-m-Y') }}</p>
      </div>

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <p>Nomor : {{ date('dmyhis') }}</p>
      </div>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-center">Tanggal</th>
          <th class="text-center">Nama Pelanggan</th>
          <th class="text-center">Nama Barang</th>
          <th class="text-center">Harga</th>
          <th class="text-center">Jumlah</th>
          <th class="text-center">Total</th>
        </tr>
      </thead>

        <tbody>
      @foreach ($faktur as $data)
          <tr>
            <td class="text-center">
              {{{ date('d-m-Y', strtotime($data->created_at)) }}}
            </td>
            <td>
              {{{ $data->nama_pelanggan }}}
            </td>
            <td>
              {{{ $data->nama_barang }}}
            </td>
            <td class="text-center">
              {{{ number_format($data->harga, null, ',', '.') }}}
            </td>
            <td class="text-center">
              {{{ number_format($data->jumlah, null, ',', '.') }}}
            </td>
            <td class="text-center">
              {{{ number_format($data->harga * $data->jumlah, null, ',', '.') }}}
            </td>
          </tr>
      @endforeach
        </tbody>
    </table>

    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
        <p><strong>Supervisor</strong></p>
      </div>

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
        <p><strong>Pelanggan</strong></p>
      </div>
    </div>

    <br><br><br>

    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
        <p><strong>( ....................................... )</strong></p>
      </div>

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
        <p><strong>( ....................................... )</strong></p>
      </div>
    </div>

    <script>
      window.print();
    </script>
  </body>
</html>