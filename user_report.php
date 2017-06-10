<?php

require_once 'core/init.php';
//register form validation
$user = new User(); //Current

if (Input::exists('post')&& $user->isLoggedIn()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'name' => array(
                'name' => 'Name',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'age' => array(
                'name' => 'age',
                'required' => true,
                'min' => 1,
                'max' => 3
            ),
            'sex' => array(
                'name' => 'sex',
                'required' => true,
            ),
            'problem' => array(
                'required' => true,
                'min'=>100,
                'max'=>900
            ),

        ));
        // $file_name=array();
        // $ext=array();
        
        for($j=0; $j < count($_FILES["item_file"]['name']); $j++)
        {$file_name[$j]=basename($_FILES['item_file']['name'][$j]);
        $ext[$j]=pathinfo($file_name[$j], PATHINFO_EXTENSION);
        // echo $ext[$j];
    }

    for($j=0;$j<count($ext);$j++)
    {
        if($ext[$j]== 'jpg' || $ext[$j] == 'jpeg' || $ext[$j] == 'png' || $ext[$j] == 'pdf' || $ext[$j] == 'doc' || $ext[$j] == 'docx')
        {   $check=1; 
    
        }
        else {  $check=0;
            break;

        }
    }
        
//data entry in users_record table
        if ($validate->passed() && $check==1) {
//            $user = new User();
            $user_id=$user->data()->id;
//            echo $user_id;
            $dr_id=Input::get('dr_id');
//            echo $dr_id;
            $name=Input::get('name');
            $age=Input::get('age');
            $sex=Input::get('sex');
            $problem=Input::get('problem');
            $total=count($_FILES["item_file"]['name']);
                $text='';
            
                if(count($_FILES["item_file"]['name'])>0)
 { 
//check if any file uploaded
  //initiate the global message
  for($j=0; $j < count($_FILES["item_file"]['name']); $j++)
 { //loop the uploaded file array
   $filen = $user_id.$_FILES["item_file"]['name']["$j"]; //file name
   $path = 'images\report_images\\'.$filen; //generate the destination path
   if(move_uploaded_file($_FILES["item_file"]['tmp_name']["$j"],$path)) 
{
   //upload the file
    // $GLOBALS['msg'] .= "File# ".($j+1)." ($filen) uploaded successfully<br>";
    //Success message
    
   }
   $text=$text.$filen.":";
  }
 }
// $text=$text.$user_id.$_FILES["item_file"]['name'][0];
 


$text=substr($text, 0,strlen($text)-1);


//             $temp_name=$_FILES['record_1']['tmp_name'];
            
//             $new_name=$user_id.$file_name;
// //            echo $new_name;
//             move_uploaded_file($temp_name,'images\report_images\\'.$new_name);
            $db=DB::getInstance();
            try {
                $data = $db->insert('user_record', array(
                    'user_id' => $user_id,
                    'name' => $name,
                    'age' => $age,
                    'sex' => $sex,
                    'problem' => $problem,
                    'record' => $text,
                    'dr_id' => $dr_id
                ));
            }catch (Exception $e){$e->getMessage();}
            Redirect::to('index.php');


        } else {    echo "File type not allowed";
//            displaying error in validation
            foreach ($validate->errors() as $error) {
                echo $error . "<br>";
                
            }
        }
    }
}
?>