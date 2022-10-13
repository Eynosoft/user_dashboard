<?php

/*
Page Name: Add User Form
Description: This forms inserts user data in the database
*/

require $_SERVER['DOCUMENT_ROOT'].'/assignment_project/vendor/autoload.php'; 
$form = new HTML_QuickForm2('adduserfrm');
session_start();
require('../db/db_class.php');
$obj = new Db_Class();

if(isset($_POST['submit']) and !empty($_POST['submit'])) {
    $res_data = array(
        'firstname' => $_POST['firstname'],
        'lastname'  => $_POST['lastname'],
        'email' => $_POST['email'],
        'creationDate' => implode('-',$_POST['creationDate'])
    );
    $ret_val = $obj->createUser($res_data);
    if($ret_val==1){
        echo '<script type="text/javascript">'; 
        echo 'alert("Record Saved Successfully");'; 
       echo 'window.location.href = "index.php";';
        echo '</script>';
    }
}

// Set defaults for the form elements

$form->addDataSource(new HTML_QuickForm2_DataSource_Array([
   'firtname' => 'Joe User'
]));

// Add some elements to the form

$fieldset = $form->addElement('fieldset')->setLabel('Add User');
$firstname = $fieldset->addElement('text', 'firstname', ['size' => 50, 'maxlength' => 255])->setLabel('First Name:');
$lastname = $fieldset->addElement('text', 'lastname', ['size' => 50, 'maxlength' => 255])->setLabel('Last Name:');
$email = $fieldset->addElement('text', 'email', ['size' => 50, 'maxlength' => 255])->setLabel('Email Address:');
$creationDate = $fieldset->addElement('date', 'creationDate','null', ['format' => 'd-F-Y', 'minYear' => date('Y'),'maxYear' => 2040])->setLabel('Creation Date:'); 
$fieldset->addElement('submit','submit', ['value' => 'Submit']);

// Define filters and validation rules

$firstname->addFilter('trim');
$firstname->addRule('required', 'Please enter your firstname');

$lastname->addFilter('trim');
$lastname->addRule('required', 'Please enter your lastname');

$email->addFilter('trim');
$email->addRule('required', 'Please enter your email address');

// Try to validate a form

// if ($form->validate()) {
//     echo '<h1>Hello, ' . htmlspecialchars($name->getValue()) . '!</h1>';
//     exit;
// }
// Output the form

echo $form;

?>