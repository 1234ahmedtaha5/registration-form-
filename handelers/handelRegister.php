<?php 


require_once "../core/request.php";
require_once "../core/validations.php";
require_once  "../core/sessions.php";
$errors=[];
if(postMethod()){

    foreach($_POST as $key => $value){
        $$key=recieveinput($value);
    }
    if(requiredInput($name)){
        $errors[]="name is required";
    }
    elseif(minInput($name,3)){
        $errors[]="minimum length is 3 char";
    }elseif(maxInput($name,50)){
        $errors[]="maximum length of name is 10 char";
    }

    if(requiredInput($email)){
        $errors[]="email is required";
    }elseif(emailInput($email)){
        $errors[]="email not valid";
    }

    if(requiredInput($password)){
        $errors[]="name is required";
    }
    elseif(minInput($password,3)){
        $errors[]="minimum length passwoed is 3 char";
    }elseif(maxInput($password,10)){
        $errors[]="maximum length of password is 10 char";
    }
    if(requiredInput($confirm_password)){
        $errors[]="name is required";
    }
    elseif(minInput($confirm_password,3)){
        $errors[]="minimum length passwoed is 3 char";
    }elseif(maxInput($confirm_password,10)){
        $errors[]="maximum length of password is 10 char";
    }elseif(sameInput($password,$confirm_password)){
        $errors[]="conform password must be the same password";
    }
    if(empty($errors)){
        $user=[
            'name'=>$name,
            'email'=>$email
        ];
        session('user',$user);
        header("location:../profile.php");
    }else{
        session("errors",$errors);
        header("location:../register.php");
    }
  
}else{
    echo "method not allowed";
}
