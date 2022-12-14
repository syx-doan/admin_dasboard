<?php
function insert_news($title,$image,$content,$date){
    $sql="INSERT INTO news(title,image,content,date) values('$title','$image','$content','$date')";
    var_dump($sql);
    // die();
    pdo_execute($sql);
}
function delete_news($id_news){
    $sql="DELETE FROM news where id_news =".$id_news;
    pdo_execute($sql);
}
function load_all_news() {
    $row = 5;
    if (isset($_GET['pagett'])) {
        $page = $_GET['pagett'];
    }else{
        $page = 1 ; 
    }
    $from = ($page - 1) * $row; 
   
    $sql = "SELECT * from news order by id_news  limit $from,$row";
    $list_news =pdo_query($sql);
    return $list_news ;
}

function load_one_news($id_news){
    $sql="SELECT * FROM news where id_news=".$id_news;
    $id_news=pdo_query_one($sql);
    return $id_news;
}
function update_news($id_news,$title,$image,$content,$date){
    $sql="UPDATE news set title='".$title."', image='".$image."', content='".$content."', date='".$date."' where id_news =".$id_news ;
    var_dump($sql);
    // die();
    pdo_execute($sql);
}
?> 