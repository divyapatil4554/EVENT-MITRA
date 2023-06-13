<?php 
error_reporting(0);
require_once "adminhelper.php";
$helper = new AdminHelper();
if($_POST)
{
    $row = $helper->checkLogin();
    if($row)
    {
        $_SESSION['auserid']=$row->id;
        $_SESSION['ausername']=$row->username;
        $_SESSION['site']='admin';
        header("Location:dashboard.php");
    }
    else
    {
        $_SESSION['auserid']     ='';
        $_SESSION['ausername']   ='';
        $_SESSION['site']       ='';
        header("Location:index.php?error=1");
    }
}
?>