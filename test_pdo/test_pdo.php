<?php



$person = array(array('name'=>'Dan', 'age'=>'30'), array('name' =>
'John', 'age' => '25'), array('name' => 'Wendy', 'age' => '32'));


// $pdo->beginTransaction() // also helps speed up your inserts
$insert_values = array();
foreach($person as $p){
   $question_marks[] = '(?,?)';
   $insert_values = array_merge($insert_values, array_values($p));
}

$sql = "INSERT INTO table_name (name, age) VALUES " . implode(',', $question_marks);
print_r($question_marks);
// $stmt = $pdo->prepare ($sql);
// try {
//     $stmt->execute($insert_values);
// } catch (PDOException $e){
//     // Do something smart about it...
// }
// $pdo->commit();

?>