<?php
include_once "../base.php";
//文字的更新
//dd($_POST);
$table=$_POST['table'];
$db=ucfirst($table);
//dd($_POST);

if(isset($_POST['text'])){
    $rows=$_POST['text'];
}else if($table=='admin'){
    $rows=$_POST['acc'];
}else{
    $rows=array_column($$db->all(),'img','id');
}

foreach($rows as $id => $text){

    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){

        $$db->del($id);
    }else{

        $row=$$db->find($id);

        switch($table){
            case 'title':
                $row['text']=$text;
                $row['sh']=($_POST['sh']==$id)?1:0;
            break;
            case 'admin':
                $row['acc']=$text;
                $row['pw']=$_POST['pw'][$id];
            break;
            case 'menu':
                $row['text']=$text;
                $row['href']=$_POST['href'][$id];
            break;
            default:
            if(isset($_POST['text'])){
                $row['text']=$text;
            }
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        }

       $$db->save($row);
    }

}
to("../backend.php?do=$table");
