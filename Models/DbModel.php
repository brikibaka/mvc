<?php

class DbModel {
    public function connect() {
        $con = mysqli_connect('localhost', 'root', '', 'briki_mvc');

        if (mysqli_connect_error()) {
            echo 'Lỗi kết nối: '. mysqli_connect_error();
        } 

        return $con;
    }
}
