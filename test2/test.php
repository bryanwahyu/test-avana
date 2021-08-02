<?
include ('excel.php')
class Check{
   public function Check($string)
   {
       $excel=new SimpleXLSX;
       $excel->parse($string);
       $i=0;
       $res;
       foreach($excel->rows()as $col)
       {
           $checked;
           
           foreach($col as $elt){
               $c=0;
               if ($i==0){
                   if(preg_match($elt,"/#/i")){
                       array_push('1',$checked);
                   }if (preg_match($elt,'/*/i')){
                       array_push('2',$checked);
                   }else{
                       array_push('3',$checked);
                   }
                   $c++;
               }
           }
           for ($b=0; $b<$c ; $b++) { 
                if($checked[$b]=='1'){
                    if(strpos(" ",$col[$b]>0)){
                       $res['data'][$i]=$res['data'][$i]."Not contain ' ' At Col".$b;
                    }
                }
                if($checked[$b]=='2'){
                    if($col[$b]==""){
                        $res['data'][$i]=$res['data'][$i]."Missing value At Col".$b;
                    }
                }
           }
           $i++;

       }
        return $res;
   } 
}