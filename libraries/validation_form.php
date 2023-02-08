<?php

#Email
function is_email(){
  $partten = "/^[A-Za-z0-9]{6,32}([@]+){1}[A-Za-z0-9]$/";
    if(preg_match($partten, $_POST['email'], $matchs))
  return true;
  return false; 
}

#username
function is_username(){
    $partten = "/^[A-Za-z0-9]{6,32}$/";
    if(preg_match($partten, $_POST['username'], $matchs))
  return true;
  return false;
}


#password
function is_password(){
  $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
  if(preg_match($partten, $_POST['password'], $matchs))
  return true;
  return false;
}

#error
function form_error($label_field){
  global $error;
 if (!empty($error[$label_field])) return "<p class ='text-danger mt-2'> $error[$label_field] </p>";
}


function set_value($label_field){
  global $$label_field;
  if(!empty($$label_field)) return $$label_field;
}

function notify($label_field){
  global $notify;
  if (!empty($notify[$label_field])) return "<p class ='text-success mt-2'> $notify[$label_field] </p>";
}


