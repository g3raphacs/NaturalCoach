<?php
    if(isset($_POST['pages']) && isset($_POST['current'])){
        $count=(int)$_POST['pages'];
        $current=(int)$_POST['current'];
    }

    if($current !== 1){
        $previous=$current-1;
        echo '<li class="page-item"><a href="javascript:void(0);" class="page-link" onclick="changePage('.$previous.')" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>';
    }


for($i=1 ; $i<($count+1) ; $i++){
    if($i === $current){
        echo '<li class="page-item active"><a href="javascript:void(0);" class="page-link">'.$i.'</a></li>';
    }
    else{
        echo '<li class="page-item"><a href="javascript:void(0);" class="page-link" onclick="changePage('.$i.')" >'.$i.'</a></li>';
    }
}


    if($current !== $count){
        $next=$current+1;
        echo '<li class="page-item"><a href="javascript:void(0);" class="page-link" onclick="changePage('.$next.')" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>';
    }
?>

