<?php

    // Bu kısım veritabanına sıralama bilgisini kaydedecek
    if (isset($_POST['order'])) {
        $order = $_POST['order'];

        print_r($order);
        // Bu fonksiyonun sizin veritabanı bağlantınıza ve tablo yapınıza göre uyarlanması gerekebilir
        saveOrderToDatabase($order);

        echo 'Sıralama bilgisi kaydedildi.';
    } else {
        echo 'Sıralama bilgisi alınamadı.';
    }

    function saveOrderToDatabase($order) {


        // Veritabanına sıralama bilgisini kaydetme işlemi
        // Örneğin, bir foreach döngüsü ile her bir öğenin sıralama bilgisini güncelleyebilirsiniz
    }

?>
