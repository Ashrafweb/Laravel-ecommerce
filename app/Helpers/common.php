<?php
use Illuminate\Support\Facades\DB;
function getTopNavCat(){
    $result['home_categories'] = DB::table('categories')
    ->where(['status'=>'1'])
    ->get();
return $result['home_categories'];
//   return " <ul class='nav navbar-nav'>
//   <li><a href='/'>Home</a></li>
//   "foreach($home_categories as $list)"
//   <li><a href='#'>{{$list->category_name}} 
//   "if(isset($sub_category))"
//   <span class='caret'></span>
//   @endif
//   </a>
  
//   </li>
//   @endforeach";  

//   echo " <ul class='nav navbar-nav'>
//   <li><a href='/'>Home</a></li>";

//   foreach($result['home_categories'] as $list){

//      echo "<li><a href='#'>{{$list->category_name}}";
//   }
//   if(isset($sub_category)){
//       echo " <span class='caret'></span>";
//   }
//   echo "</a>";

}
?>