<?php
session_start(); #فتح الجلسة 
include ('Connection.php'); #تضمين صفحة الإتصال 
#التأكد من عدم فراغ الحقول #حلقة الشرط الخارجية
if (!empty($_POST['userName']) & !empty($_POST['name']) & !empty($_POST['userPassword']) & !empty($_POST['userState']) & !empty($_POST['userId']))
{
$id = $_POST['userId'];
$name = $_POST['name'];
$phone = $_POST['userPhone'];
$userName = $_POST['userName'];
$password = $_POST['userPassword'];
$state = $_POST['userState'];
 #مقارنة في حالة تم النقر على زر الإضافة
if(isset($_POST['addUsers']))
{

$sql ="Insert into Users (U_Id , U_Name ,U_Phone ,U_UserName ,U_Password ,U_State ) Values ($id,'$name','$phone','$userName','$password','$state') ";
#إستدعاء دالة العمليات بإرسال أمر الإضافة 
if(Operations($sql))
{ header('location:Users.php?op=1'); }#ارسال رقم الرسالة عند نجاح تنفيذ امر الإضافة
else
{ header('location:Users.php?op=2'); } }#ارسال رقم الرسالة عند عدم تنفيذ امر الإضافة

#مقارنة في حالة تم النقر على زر البحث
elseif (isset($_POST['searchUButton']))
{ 
    $text =  $_POST['searchUsers'];
    $result = Search($text,1);#إستدعاء دالة البحث مع تمرير القيمة المرسلة من حقل البحث 
    if($result){ #التحقق من ان عملية البحث تمت اي توجد بيانات 
    $_SESSION['search'] = $result[0];
    header('location:Users.php');
    }
    else{#في حال لم تتم عملية الإستعلام يتم ارسال رقم العملية لظهور رسالة مناسبة 
        header('location:Users.php?op=4');
    }

}#مقارنة في حالة تم النقر على زر التعديل
elseif (isset($_POST['updateUsers']))
{
    $sql ="Update Users Set U_Id = $id ,U_Name = '$name', U_Phone ='$phone', U_UserName = '$userName' , U_Password = '$password', U_State ='$state' where U_Id=$id";
#إستدعاء دالة العمليات بإرسال أمر التعديل 
    if(Operations($sql))
{ header('location:Users.php?op=5'); #ارسال رقم الرسالة عند نجاح تنفيذ امر التعديل
if($id>MaxNum()){header('location:Users.php?op=6');}#ارسال رقم الرسالة عندما يكون رقم المستخدم غير موجود 
}
else
{ header('location:Users.php?op=7'); } }#ارسال رقم الرسالة عند عدم تنفيذ امر التعديل
#مقارنة في حالة تم النقر على زر الحذف
elseif (isset($_POST['deleteUsers']))
{
    $sql ="Delete from Users where U_Id=$id";
    #إستدعاء دالة العمليات بإرسال أمر الحذف 
if(Operations($sql))
{ header('location:Users.php?op=8'); }#ارسال رقم الرسالة عند نجاح تنفيذ امر الحذف
else
{ header('location:Users.php?op=9'); } }#ارسال رقم الرسالة عند عدم تنفيذ امر الحذف
}
else #تابع حلقة الشرط الخارجية
{
    header('location:Users.php?op=3');#ارسال رقم الرسالة عندما تكون الحقول فارغة
}
?>