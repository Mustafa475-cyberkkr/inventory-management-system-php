<?php
//صفحة برمجة صفحة الدخول Index 
include('Connection.php');
//دالة للتأكد من أن الفورم يحتوي على بيانات
if(!empty($_POST['userName']) & !empty($_POST['password']) )
{
    $user = $_POST['userName'];
    $pass = $_POST['password'];
    $sql = mysqli_query($conn , "select * from Users where U_UserName ='$user' and U_Password = '$pass'");
    $row = mysqli_fetch_array($sql);
    //للتأكد من صحة البيانات 
    if(!empty($row))
    {
        #تحديد مدة الجلسة 
        session_set_cookie_params(time() + 60*5);
        #إنشاء الجلسة 
        session_start();
        $id = $row[0];
        $userName = $row[3];
        $Name = $row[1];
        $State = $row[5];
        $_SESSION['userId']=$id;
        $_SESSION['userName']=$Name;
        $_SESSION['userState']=$State;
        //تضمين الصفحة الرئيسية مع ارسال رقم المستخدم 
        header("location:Home.php"); 
    }
    else
    {
       //تضمين صفحة الدخول من جديد مع ارسال رقم الخطأ 
        header("location:index.php?error=1"); 
    }
}
else
{
    //تضمين صفحة الدخول من جديد مع ارسال رقم الخطأ 
    header("location:index.php?error=2"); 
}
?>