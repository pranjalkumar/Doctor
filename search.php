<?php
require_once 'core/init.php';
//ajax live search implementation
if(Input::exists('get'))
{
    $name=Input::get('name');
    $db=DB::getInstance();
    $data=$db->query("SELECT DISTINCT dr_profession FROM doctor WHERE dr_profession LIKE '".$name."%';");
    $count=$data->count();
    
    for ($i = 0; $i < $count; ++$i)
    {
        $arr[]=array('id'=>$data->results()[$i]->dr_profession);
    }
//    $arr[]=array('id'=>$data->results()[0]->dr_profession);
    $arr[]=array('id'=>'Search -'.$name.'- in clinic');
    $arr[]=array('id'=>'Search -'.$name.'- in lab');
    $arr[]=array('id'=>'Search -'.$name.'- in doctors');
    echo json_encode($arr);
//    print_r($arr);
}
//data returned in json format
?>