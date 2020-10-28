<?php
  include_once('header.php');
?>
<body>
    <form action="?controller=admin&action=doUpdate&id=<?php echo $post['ID'] ?>" method="post" enctype="multipart/form-data">
        <label>Tiêu đề</label><br>
        <input type="text" name="newtitle" value="<?php echo $post['title'] ?>"><br><br>
        <label>Nội dung</label><br>
        <textarea name="newcontent" cols="30" rows="10"><?php echo $post['content'] ?></textarea><br><br>
        <label>Ảnh</label>
        <input type="file" name="newupload" accept="image/png, image/jpeg"><br><br>
        
        <input type="submit" value="Cập nhật" name="update">
    </form>
</body>
</html>