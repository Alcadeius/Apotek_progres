<?php
    date_default_timezone_set('Asia/Jakarta');
    $time=waktu('18-09-21 08:26');
    if(isset($time)){
        $_SESSION["waktu"]=$time;
        header("Location:dashboard.php?waktu=$time");
    }
    function waktu($tokito){
        $waktu= strtotime($tokito);
        $sekarang=time();
        $perbedaan=$sekarang-$waktu;

        $detik=$perbedaan;
        $menit=round($detik/60);
        $jam=round($detik/3600);
        $hari=round($detik/86400);
        $minggu=round($detik/604800);
        $bulan=round($detik/2629440);
        $tahun=round($detik/31553280);

        if($detik <= 60){
            echo "baru saja";
        }
        elseif($menit <=60)
        {
            if($menit ==1){
                echo "1 Menit Yang lalu";
            }else{
                echo "$menit Menit yang lalu";
            }
        }
    }
?>