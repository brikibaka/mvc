<?php

require_once('DbModel.php');

class PostModel extends DbModel {
    public function getPost() {
        $con = $this->connect();

        $result = $con->query('select * from posts');
    
        $post = array();
    
        if ($result->num_rows > 0) {
            while ($post = mysqli_fetch_assoc($result)) {
                $posts[] = $post;
            }
        }
    
        return $posts;
    }

    public function getPostById($id) {
        $con = $this->connect();

        $result = $con->query('select * from posts where id='.$id);
        
        $post = array();

        if ($result->num_rows > 0) {
            $post = mysqli_fetch_assoc($result);
        }
    
        return $post;
    }

    public function addPost($post) {
        $con = $this->connect();

        $sql = "INSERT INTO `posts` (`id`, `title`, `content`, `date`, `upload`, `category`, `tag`) 
        VALUES (NULL, '". $post['title'] ."', '". $post['content'] ."', current_timestamp(),'". $post['upload'] ."', '', '')";
        $result = $con->query($sql);

        return $result;
    }

    public function updatePost($post) {
        $con = $this->connect();

        $sql = "UPDATE `posts` SET `title`='". $post['title'] ."',`content`='". $post['content'] ."',`date`=current_timestamp() WHERE `posts`.`ID`=".$post['ID'];
        $result = $con->query($sql);

        return $result;
    }

    public function deletePost($id) {
        $con = $this->connect();

        $sql = "DELETE FROM `posts` WHERE `posts`.`id` =" . $id;
        $result = $con->query($sql);

        return $result;
    }
}