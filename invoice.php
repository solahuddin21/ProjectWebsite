<?php
include 'cek_cookie.php';

$id = $_GET['id'];
$data_individu = query("SELECT * FROM daftar_individu WHERE id = $id")[0];

$tanggal = substr($data_individu['invoice'], 4, 10);

$output = '
  <table border="1" width="100%" cellpadding="5" cellspacing="0" >
      <tr>
        <td colspan="2" align="center" style="font-size:18px"><b>INVOICE</b></td>
      </tr>
      <tr>
        <td colspan="2">
          <table border="0" width="100%" cellpadding="5">
            <tr>
              <td width="75%">
                Kepada,<br />
                <b>PENERIMA</b><br /><br />
                <table border="0">
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>'.$data_individu['nama'].'</td>
                  </tr>
                  <tr>
                    <td>Domisili</td>
                    <td>:</td>
                    <td>'.$data_individu['domisili'].'</td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>'.$data_individu['tanggal_lahir'].'</td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>'.$data_individu['alamat'].'</td>
                  </tr>
                  <tr>
                    <td>No KTP</td>
                    <td>:</td>
                    <td>'.$data_individu['no_ktp'].'</td>
                  </tr>
                  <tr>
                    <td>No Handphone</td>
                    <td>:</td>
                    <td>'.$data_individu['no_telp'].'</td>
                  </tr>
                  <tr>
                    <td>Cabang</td>
                    <td>:</td>
                    <td>'.$data_individu['cabang'].'</td>
                  </tr>
                </table>
              </td>
              <td width="25%">
              <table border="0">
                  <tr>
                    <td>No Invoice</td>
                    <td>:</td>
                    <td><b>'.$data_individu['invoice'].'</b></td>
                  </tr>
                  <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>'.$tanggal.'</td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <br/>
          <table width="100%" border="1" cellpadding="5" cellspacing="0">
            <tr>
              <th align="left">No.</th>
              <th align="left">Keterangan</th>
              <th align="left">Biaya</th>
            </tr>
            <tr>
              <td align="left">1</td>
              <td align="left">Pendaftaran Anggota Individu Prisai Sakti Mataram</td>
              <td align="left">Rp. 30.000,00</td>
            </tr>
            <tr>
              <td align="right" colspan="2"><b>Sub Total</b></td>
              <td align="left">Rp. 30.000,00</td>
            </tr>
            <tr>
              <td align="right" colspan="2"><b>TOTAL</b></td>
              <td align="left"><b>Rp. 30.000,00</b></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    </br>
    <textarea  cols="30" rows="10">
      Untuk Pembayaran Silahkan melalui Rekening Berikut : 104801740 a.n Saya (BankJagoan)
      Setelah itu kirim bukti transaksi melalui WA +8910401903 atau pada footer tertera kontak kami
    </textarea>

';

$invoiceFileName = $data_individu['invoice'].'_'.$data_individu['nama'];
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>
