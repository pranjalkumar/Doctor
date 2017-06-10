<?php

require_once 'core/init.php';

if(Input::exists('post') && isset($_FILES['voice_rec']))
{	
	if(Token::check(Input::get('token')))
	{		
		$user_id=1;
		$dr_id=1;
		$voice_file_name=basename($_FILES['voice_rec']['name']);
		$voice_file_ext=pathinfo($voice_file_name,PATHINFO_EXTENSION);
		$voive_file_size=$_FILES['voice_rec']['size'];
		$string=date('m/d/Y h:i:s a', time());
		$string = preg_replace('/\s+/', '', $string);
			$string=str_ireplace(':', '_', $string);
			// echo $string;
		$new_name=$user_id.$string.$voice_file_name;
		$path="voice\\".$new_name;
		// echo $voive_file_size;
		// echo $voice_file_ext;
		$check=0;
		if($voice_file_ext== 'mp3' || $voice_file_ext=='wav' || $voice_file_ext== 'm4a')
			{		move_uploaded_file($_FILES['voice_rec']['tmp_name'], $path);
					$check=1;
			}
		if($check==0)
		{
			// die('The file type is not supported');
		}
		if($check==1)
		{
			try{	

				$db=DB::getInstance();
			$data=$db->insert('voice_record',array(
					'voice_file_addr'=>$new_name,
					'user_id'=>$user_id,
					'dr_id'=>$dr_id
				));
			}catch(Exception $e)
			{
				echo $e->getMessage();
			}

		}
	}
}




?>
<html>
<head>
<TITLE>User Page</TITLE>
</head>
<body>
	<form action="user.php" method="post" enctype="multipart/form-data">
		<lable>Upload the voice recording file</lable>
		<input type="file" name="voice_rec" onchange="ValidateSingleInput(this);">
        <p>File extension should be .mp3, .wav, .m4a and file size is not greater then 2 MB</p>
		<input type="hidden" name="token" value="<?php echo Token::generate();?>">
		<button type="submit">Submit</button>
	</form>
</body>
<script type="text/javascript">
var _validFileExtensions = [".mp3", ".wav", ".m4a"];   
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));<!--Alert Message--> 
                oInput.value = ""; <!--Remove file-->
                return false;
            }
	   
	   var fi = document.getElementById('file'); // GET THE FILE INPUT.
        // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
        if (fi.files.length > 0) {
            // RUN A LOOP TO CHECK EACH SELECTED FILE.
            for (var i = 0; i <= fi.files.length - 1; i++) {

                var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
				var flekb = (fsize / 1024);
				if(flekb>2048){
               alert('File size is more then 2 MB'); <!--Alert Message-->
				oInput.value = "";
                return false;
				}
						
            }
        }
        }
    }
    return true;
}
</script>
<?php
$string=date('m/d/Y h:i:s a', time());
$string = preg_replace('/\s+/', '', $string);
$string=str_ireplace(':', '_', $string);
echo $string;
?>