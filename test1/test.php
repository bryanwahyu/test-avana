<?php 
class test {
     
     public function findIndex($string,$no){
        $count=0;
        $res="no found";

        for( $i=$no ; $i< strlen($string); $i++){
             if($string[$i]=='('){
                 $count++;
             }else if($string[$i]==")"&&$count>1){
                 $count--;
             }else if($string[$i]==")" && $count==1){
                 $res="Found in index =".$i;
                 return $res;
             }

         }
         return $res;
    }
}