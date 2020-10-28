<?php
class AdminView {
    public function showAllPost($posts) {
        require_once('Templates/admin/admin.php');
    }

    public function addPost() {
        require_once('Templates/admin/addPost.php');
    }

    public function notifyAllPost($status) {
        if ($status) {
            echo 'Thao tác thành công. <a href="http://localhost/dev/mvc/?controller=Admin">Trở về trang chủ</a>';
        } else {
            echo 'Lỗi';
        }
    }

    public function editPost($post) {
        require_once('Templates/admin/editPost.php');
    }
}