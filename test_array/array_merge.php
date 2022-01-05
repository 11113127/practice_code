<?php
$key = array("a","b","c");
$result = array();

$a1 = array(
  array("pic"=>1,"path"=>"aaa"),
  array("pic"=>2,"path"=>"bbb"),
  array("pic"=>3,"path"=>"ccc")
);

$a2 = array(
  array("test"=>4,"q"=>"aaa"),
  array("test"=>5,"q"=>"bbb"),
  array("test"=>6,"q"=>"ccc")
);


for($i=0; $i<count($key);$i++){
	$result[$key[$i]] = array_merge($a1[$i],$a2[$i]);
}

print_r($result);
?>