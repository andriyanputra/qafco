(function($)
{
  // auto fokus input pertama
  $("form").find("input[type=text]:first").focus();

  // tombol modal diklik
  $(".tombol-modal").click(function()
  {
    // back objek
    var back  = $(this).data("back");

    // url objek
    var url   = $(this).data("url");

    // tipe objek
    var tipe  = $(this).data("tipe");

    // kode objek
    var kode  = $(this).data("kode");

    $(".modal-objek").text( tipe );
    $("#modal-kode").text( kode );
    $("#yes").data("url", url).data("back", back);
    $("#konfirmasi").modal("show");
  });

  // foto
  $(".foto").click(function()
  {
    var nama = $(this).data("nama");
    var foto = $(this).data("foto");

    $("#nama-foto").text( nama );
    $("#img-foto").prop( "src", url_foto + "/" + foto );
    $("#modal-foto").modal("show");
  });

  // konfirmasi diklik
  $("#yes").click(function()
  {
    // redirect
    var back = $(this).data("back");

    // ajax delete request
    $.ajax({
      url: $(this).data("url"),
      type: "DELETE",
      data: {  },
      success: function(data, textStatus, jqXHR)
      {
        $(location).prop("href", back);
      }
    });
  });

  // tooltip
  $(".ikon").tooltip();

  // rubah ikon panah ketika menu diklik
  $(".menu").click(function()
  {
    var icon = $(this).find(".arrow-menu");

    if (icon.hasClass("glyphicon-chevron-right"))
    {
      icon
        .removeClass("glyphicon-chevron-right")
        .addClass("glyphicon-chevron-down")
    }
    else
    {
      icon
        .removeClass("glyphicon-chevron-down")
        .addClass("glyphicon-chevron-right")
    };
  });

  // kode pemasok dipilih
  $("#kode-pemasok").change(function()
  {
    var nama   = $(this).find("option:selected").data("nama");
    var alamat = $(this).find("option:selected").data("alamat");

    $("#nama-pemasok").val(nama);
    $("#alamat-pemasok").val(alamat);
  });

  // kode pelanggan dipilih
  $("#kode-pelanggan").change(function()
  {
    var nama   = $(this).find("option:selected").data("nama");
    var alamat = $(this).find("option:selected").data("alamat");

    $("#nama-pelanggan").val(nama);
    $("#alamat-pelanggan").val(alamat);
  });

  // kode barang dipilih
  $("#kode-barang").change(function()
  {
    var nama   = $(this).find("option:selected").data("nama");
    var satuan = $(this).find("option:selected").data("satuan");
    var harga  = $(this).find("option:selected").data("harga");

    $("#nama-barang").val(nama);
    $("#satuan").val(satuan);
    $("#harga").val(harga);

    total();
  });

  // event tekan keyboard di input jumlah
  $("#jumlah").on("keyup keypress blur change", function()
  {
    total();
  });

  // kalkulasi total
  function total()
  {
    var jumlah = $("#jumlah").val();
    var harga = $("#harga").val();
    var total = parseInt(jumlah) * parseInt(harga);

    if (! isNaN(total))
      total = total;
    else
      total = 0;

    $("#total").val(total);
  }

  // ada variabel nama_corp
  if(typeof nama_corp !== "undefined")
  {
    Highcharts.setOptions({
      lang: {
        months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        shortMonths: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        weekdays: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        thousandsSep: '.',
        decimalPoint: ','
      }
    });

    $.each(data, function(index, val) {
      bulan.push(val.bulan);
      jumlah.push(parseInt(val.jumlah));
    });

    $(".grafik").highcharts(
    {
      title: {
        text: nama_corp,
        x: -20
      },
      subtitle: {
        text: "Grafik "+tipe,
        x: -20
      },
      xAxis: {
        title: {
          text: "Bulan"
        },
        categories: bulan
      },
      yAxis: {
        title: {
          text: "Jumlah"
        },
        plotLines: [{
          value: 0,
          width: 1,
          color: "#808080"
        }]
      },

      series: [{
        name: tipe,
        data: jumlah
      }],
      credits: {
        enabled: false
      }
    });
  }

})(jQuery);