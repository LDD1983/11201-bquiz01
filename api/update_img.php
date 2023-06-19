<?php
include_once "../base.php";
//文字的更新
//dd($_POST);
$table=$_POST['table'];
$db=ucfirst($table);
//dd($_POST);

$row=$$db->find($_POST['id']);

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
    $row['img']=$_FILES['img']['name'];
}

$$db->save($row);
to("../backend.php?do=$table");
