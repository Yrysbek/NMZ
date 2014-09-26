<?php
          $route_array = explode('/', $_SERVER['REQUEST_URI']);
            
            if(!empty($route_array[1])) {
               $controller_name = $route_array[1];
foreach($route_array as $value){
echo $value;
}
            }

echo $controller_name;
