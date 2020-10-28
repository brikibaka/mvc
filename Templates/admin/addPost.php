<?php
  include_once('header.php');
?>

<body>
    <form action="?controller=admin&action=doAdd" method="post" enctype="multipart/form-data">
        <label>Tiêu đề</label><br><input type="text" name="title"><br><br>
        <label>Nội dung</label><br><textarea name="content" cols="30" rows="10"></textarea><br><br>
        <label>Ảnh</label><input type="file" name="upload" accept="image/png, image/jpeg"><br><br>
        <input type="submit" value="Thêm" name="add">
    </form>
</body>
</html>