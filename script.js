// JS Untuk Datepicker
$(function () {
    $('#datepicker').datepicker();
});

// JS Untuk Maps
function initMap() {
    // Map Options
    var options = {
      zoom: 6,
      center: { lat: -6.112566, lng: 106.928340 },
    };

    // New map
    var map = new google.maps.Map(document.getElementById('map'), options);

    var contentMarker1 =
      '<div class="fs-3">' +
      '<h2>Detail Lokasi</h2>' +
      '<div class="fs-5">' +
      '<table><tr><td>Latitude</td><td>:</td><td>-6.112566</td></tr>' +
      '<tr><td>Longitude</td><td>:</td><td>106.928340</td></tr>' +
      '<tr><td>Alamat</td><td>:</td><td>Gg. Elang VI No.17, RT.7, Semper Tim., Kec. Cilincing, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14130</td></tr></table></div>' +
      '<style>table td, table td * {vertical-align: top;}</style>';

    var contentMarker2 =
      '<div class="fs-3">' +
      '<h2>Detail Lokasi</h2>' +
      '<div class="fs-5">' +
      '<table><tr><td>Latitude</td><td>:</td><td>-6.497641</td></tr>' +
      '<tr><td>Longitude</td><td>:</td><td>106.828224</td></tr>' +
      '<tr><td>Alamat</td><td>:</td><td>Jalan Raya Tegar Beriman Pemda Cibinong No. 27 A-B, RT. 01 RW. 04, Kampung Pondok Manggis, Bojong Baru, Bojong Gede, Pakansari, Cibinong, Bogor, Jawa Barat 16914</td></tr></table></div>' +
      '<style>table td, table td * {vertical-align: top;}</style>';

    var contentMarker3 =
      '<div class="fs-3">' +
      '<h2>Detail Lokasi</h2>' +
      '<div class="fs-5">' +
      '<table><tr><td>Latitude</td><td>:</td><td>-6.178306</td></tr>' +
      '<tr><td>Longitude</td><td>:</td><td>106.631889</td></tr>' +
      '<tr><td>Alamat</td><td>:</td><td>JL Cendana, RT 02 RW 06, Pemukiman Salembaran, RT.002/RW.006, Sukasari, Kec. Tangerang, Kota Tangerang, Banten 15214</td></tr></table></div>' +
      '<style>table td, table td * {vertical-align: top;}</style>';

    var contentMarker4 =
      '<div class="fs-3">' +
      '<h2>Detail Lokasi</h2>' +
      '<div class="fs-5">' +
      '<table><tr><td>Latitude</td><td>:</td><td>-3.972201</td></tr>' +
      '<tr><td>Longitude</td><td>:</td><td>122.5149</td></tr>' +
      '<tr><td>Alamat</td><td>:</td><td>Jl. H. Abdul Silondae, Korumba, Kec. Mandonga, Kota Kendari, Sulawesi Tenggara 93111</td></tr></table></div>' +
      '<style>table td, table td * {vertical-align: top;}</style>';

    var contentMarker5 =
      '<div class="fs-3">' +
      '<h2>Detail Lokasi</h2>' +
      '<div class="fs-5">' +
      '<table><tr><td>Latitude</td><td>:</td><td>-6.966667</td></tr>' +
      '<tr><td>Longitude</td><td>:</td><td>110.416664</td></tr>' +
      '<tr><td>Alamat</td><td>:</td><td>Jl. Darat Tempel, Dadapsari, Kec. Semarang Utara, Kota Semarang, Jawa Tengah 50173</td></tr></table></div>' +
      '<style>table td, table td * {vertical-align: top;}</style>';

    var contentMarker6 =
      '<div class="fs-3">' +
      '<h2>Detail Lokasi</h2>' +
      '<div class="fs-5">' +
      '<table><tr><td>Latitude</td><td>:</td><td>-2.423779</td></tr>' +
      '<tr><td>Longitude</td><td>:</td><td>115.250832</td></tr>' +
      '<tr><td>Alamat</td><td>:</td><td>Jl. Patmaraga, Kebun Sari, Amuntai Tengah, Kabupaten Hulu Sungai Utara, Kalimantan Selatan 71414</td></tr></table></div>' +
      '<style>table td, table td * {vertical-align: top;}</style>';

    var contentMarker7 =
      '<div class="fs-3">' +
      '<h2>Detail Lokasi</h2>' +
      '<div class="fs-5">' +
      '<table><tr><td>Latitude</td><td>:</td><td>1.045626</td></tr>' +
      '<tr><td>Longitude</td><td>:</td><td>104.030457</td></tr>' +
      '<tr><td>Alamat</td><td>:</td><td>Jl. Letjend Suprapto, Kabil, Kec. Sei Beduk, Kota Batam, Kepulauan Riau 29433</td></tr></table></div>' +
      '<style>table td, table td * {vertical-align: top;}</style>';

    var contentMarker8 =
      '<div class="fs-3">' +
      '<h2>Detail Lokasi</h2>' +
      '<div class="fs-5">' +
      '<table><tr><td>Latitude</td><td>:</td><td>-3.316694</td></tr>' +
      '<tr><td>Longitude</td><td>:</td><td>114.590111</td></tr>' +
      '<tr><td>Alamat</td><td>:</td><td>Jl. S. Parman, Antasan Besar, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70123</td></tr></table></div>' +
      '<style>table td, table td * {vertical-align: top;}</style>';

    var contentMarker9 =
      '<div class="fs-3">' +
      '<h2>Detail Lokasi</h2>' +
      '<div class="fs-5">' +
      '<table><tr><td>Latitude</td><td>:</td><td>-6.12</td></tr>' +
      '<tr><td>Longitude</td><td>:</td><td>106.150276</td></tr>' +
      '<tr><td>Alamat</td><td>:</td><td>Gg. Term. Husein Makun, Serang, Kec. Serang, Kota Serang, Banten 42116</td></tr></table></div>' +
      '<style>table td, table td * {vertical-align: top;}</style>';

    addMarker({ coords: { lat: -6.112566, lng: 106.928340 }, content: contentMarker1 });
    addMarker({ coords: { lat: -6.497641, lng: 106.828224 }, content: contentMarker2 });
    addMarker({ coords: { lat: -6.178306, lng: 106.631889 }, content: contentMarker3 });
    addMarker({ coords: { lat: -3.972201, lng: 122.5149 }, content: contentMarker4 });
    addMarker({ coords: { lat: -6.966667, lng: 110.416664 }, content: contentMarker5 });
    addMarker({ coords: { lat: -2.423779, lng: 115.250832 }, content: contentMarker6 });
    addMarker({ coords: { lat: 1.045626, lng: 104.030457 }, content: contentMarker7 });
    addMarker({ coords: { lat: -3.316694, lng: 114.590111 }, content: contentMarker8 });
    addMarker({ coords: { lat: -6.12, lng: 106.150276 }, content: contentMarker9 });

    function addMarker(props) {
      var marker = new google.maps.Marker({
        position: props.coords,
        map: map,
        icon: props.iconImage,
      });

      if (props.content) {
        var infoWindow = new google.maps.InfoWindow({
          content: props.content
        });

        marker.addListener('click', function () {
          infoWindow.open(map, marker);
        });
      }
    }
  }