<?php
  if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) )
  {
    /* Dibawah ini adalah sebuah perintah agar mengalihkan ke file Index, saat file di akses secara langsung*/
    header("Location: ../");
  }
  
  else
  {
    function formatBytes($size, $precision = 2)
    {
      $base = log($size, 1024);
      $suffixes = array('', 'KB', 'MB', 'GB', 'TB');

      return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }

    function curl_get_file_size( $url )
    {
      $ch = curl_init($url);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HEADER, TRUE);
      curl_setopt($ch, CURLOPT_NOBODY, TRUE);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

      $data = curl_exec($ch);
      $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

      curl_close($ch);
      return $size;
    }

    function tgl_indo($tanggal, $cetak_hari = false)
    {
      $hari = array ( 1 => 'Senin',
          'Selasa',
          'Rabu',
          'Kamis',
          'Jumat',
          'Sabtu',
          'Minggu'
        );

      $bulan = array (1 => 'Januari',
          'Februari',
          'Maret',
          'April',
          'Mei',
          'Juni',
          'Juli',
          'Agustus',
          'September',
          'Oktober',
          'November',
          'Desember'
        );
      $split = explode('-', $tanggal);
      $tgl_indo = $split[2]. ' ' .$bulan[(int)$split[1]].' '.$split[0];

      if ($cetak_hari == true)
      {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
      }
       
      else
      {
        return $tgl_indo;
      }
    }
  }
?>
