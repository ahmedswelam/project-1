<?php 
 

function Clean($input){

     return   strip_tags(trim($input));
}



function validate($input,$flag){

     $status = true;
    switch ($flag) {
        case 1:
            # code...
              if(empty($input)){
                  $status = false;
              }
            break;
        
        case 2: 
        # code ... 
        if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
            $status = false;
        }
        break;


        case 3:
        # code ... 
        if(strlen($input) < 6){
            $status = false; 
        }
        break;
  

        case 4: 
        # code ... 
        if(!filter_var($input,FILTER_VALIDATE_INT)){
            $status = false;
        }
        break;

       case 5: 
       #code .... 
       $allowedExtension = ["png",'jpg'];
       if(!in_array($input,$allowedExtension)){
           $status = false;
       }
       break;
    }

    return $status ; 
}





function url($url){

 return   "http://".$_SERVER['HTTP_HOST']."/fairouz".$url; 

}

function count_digit($number) {
    return strlen($number);
  }




  function lognin_area(){
        echo '
            <div class="our-link">
                <ul>
                    <li><a>         Welcome   </a></li>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Our location</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        
        ';
}


?>