<?php
  include_once('header.php');
?>
<body>
    <div>
        <a href="?controller=admin&action=addPost">Thêm vài viết</a>
        <table class="table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Ảnh</th>
                <th>Ngày update</th>
                <th>Danh mục</th>
                <th>Tags</th>
                <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) {
                    echo "<tr>
                        <td>". $post['ID'] ."</td>
                        <td>". $post['title'] ."</td>
                        <td>". $post['content'] ."</td>
                        <td><img src='". $post['upload'] ."' style=\"width:100px; height: 100px\"</td>
                        <td>". $post['date'] ."</td>
                        <td>". $post['category'] ."</td>
                        <td>". $post['tag'] ."</td>
                        <td><a href='?controller=admin&action=editPost&id=". $post['ID']. "'>Sửa</a>
                            <a href='?controller=admin&action=deletePost&id=". $post['ID']. "'>Xóa</a></td></tr>";
                } ?>
            </tbody>
        </table>
    </div>
</body>
</html>