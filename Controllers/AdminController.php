<?php

class AdminController {
    
    public function index() {
        require_once('Models/PostModel.php');
        $adminModel = new PostModel();
        $posts = $adminModel -> getPost();
        
        require_once('Views/AdminView.php');
        $adminView = new AdminView();
        $adminView->showAllPost($posts);
    }

    public function addPost() {
        require_once('Views/AdminView.php');
        $adminView = new AdminView();
        $adminView->addPost();
    }

    public function doAdd() {
        $title = $_POST['title'];
        $content = $_POST['content'];

        $target_dir = "assets/images/";
        $target_file = $target_dir . basename($_FILES["upload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["upload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
                $img_url = $target_file ; 
            } else {
                die("Sorry, there was an error uploading your file.");
            }
        }

        $post = array(
            'title' => $title,
            'content' => $content,
            'upload' => $img_url,
        );

        require_once('Models/PostModel.php');
        $addPost = new PostModel();
        $status = $addPost->addPost($post);

        require_once('Views/AdminView.php');
        $postView = new AdminView();
        $postView->notifyAllPost($status);
    }

    public function editPost() {
        $id = $_GET['id'];

        require_once('Models/PostModel.php');
        $admin = new PostModel();
        $post = $admin->getPostById($id);

        require_once('Views/AdminView.php');
        $adminView = new AdminView();
        $adminView->editPost($post);
    }

    public function doUpdate() {
        $title = $_POST['newtitle'];
        $content = $_POST['newcontent'];
        $id = $_GET['id'];

        if (!empty($_POST['newupload'])) {
            $target_dir = "assets/images/";
            $target_file = $target_dir . basename($_FILES["newupload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $check = getimagesize($_FILES["newupload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["newupload"]["tmp_name"], $target_file)) {
                    $img_url = $target_file; 
                } else {
                    die("Sorry, there was an error uploading your file.");
                }
            }

            $post = array(
                'ID' => $id,
                'title' => $title,
                'content' => $content,
                'upload' => $img_url,
            );
        } else {
            $post = array(
                'ID' => $id,
                'title' => $title,
                'content' => $content,
            );
        }

        require_once('Models/PostModel.php');
        $updatePost = new PostModel();
        $updatePost->updatePost($post);
    }

    public function deletePost() {
        $id = $_GET['id'];

        require_once('Models/PostModel.php');
        $admin = new PostModel();
        $status = $admin->deletePost($id);

        require_once('Views/AdminView.php');
        $adminView = new AdminView();
        $adminView->notifyAllPost($status);
    }
}