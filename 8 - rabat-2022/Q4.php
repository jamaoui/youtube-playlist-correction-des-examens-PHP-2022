<?php 
function amountAllowances(int $numberOfchild){
    if($numberOfchild==1){
        return 300;
    }else if($numberOfchild==2){
        return 500;
    }
    else if($numberOfchild>=3){
        return 600;
    }
}
echo amountAllowances(1);
?>