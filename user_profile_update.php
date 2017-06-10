<?php
// AJAX
require_once 'core/init.php';

if(Input::exists('post'))
{
    $contact = Input::get('contact');

    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'contact' => array(
            'required' => true,
            'min' => 10,
            'max' => 13
        )
    ));

    if ($validate->passed()) {
        $user = new User();
        
        $user->update(array(
            'contact' => $contact
        ));

        echo "true";
    }
    else echo "false";
}
?>