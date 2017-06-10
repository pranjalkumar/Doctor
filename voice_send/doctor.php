<?php
require_once 'core/init.php';


$dr_id=1;
$db=DB::getInstance();
$voice_record=$db->get('voice_record',array('dr_id','=',$dr_id));
$voice_record_count=$voice_record->count();
// echo $voice_record->results()[0]->voice_file_addr;
for($i=0;$i<$voice_record_count;$i++)
{
	echo '<audio controls>
  <source src="voice\\'.$voice_record->results()[$i]->voice_file_addr.'" type="audio/ogg">
 
  Your browser does not support the audio element.
</audio>';
echo "<br>";
}




?>