<?php
session_start(); #فتح الجلسة 
include ('Connection.php'); #تضمين صفحة الإتصال 
#التأكد من عدم فراغ الحقول #حلقة الشرط الخارجية
if (!empty($_POST['buyingId']) & !empty($_POST['buyingName']) & !empty($_POST['buyingPrice']) & !empty($_POST['buyingAmount']) )
{
$id = $_POST['buyingId'];
$name = $_POST['buyingName'];
$price = $_POST['buyingPrice'];
$cost = $_POST['buyingCost'];
$amount = $_POST['buyingAmount'];
//settype($amount,'int');#تحويل من نص الى رقم 
$userId = $_SESSION['userId'];
 #مقارنة في حالة تم النقر على زر الإضافة
if(isset($_POST['addBuying']))
{

$sql ="Insert into Buying (B_Id , B_Name ,B_Price ,B_Cost ,B_Amount ,B_U_Id ) Values ($id,'$name',$price,$cost,$amount,$userId) ";
#إستدعاء دالة العمليات بإرسال أمر الإضافة 
if(Operations($sql))
{ header('location:Buying.php?op=1'); 
  //mysqli_query($conn, "Update Prudacts Set P_Amount = 10 where P_Name=$name"); 
}#ارسال رقم الرسالة عند نجاح تنفيذ امر الإضافة
else
{ header('location:Buying.php?op=2'); } }#ارسال رقم الرسالة عند عدم تنفيذ امر الإضافة

#مقارنة في حالة تم النقر على زر البحث
elseif (isset($_POST['searchBButton']))
{ 
    $text =  $_POST['searchBuying'];
    $result = Search($text,3);#إستدعاء دالة البحث مع تمرير القيمة المرسلة من حقل البحث 
    if($result){ #التحقق من ان عملية البحث تمت اي توجد بيانات 
    $_SESSION['search'] = $result[0];
    header('location:Buying.php');
    }
    else{#في حال لم تتم عملية الإستعلام يتم ارسال رقم العملية لظهور رسالة مناسبة 
        header('location:Buying.php?op=4');
    }

}#مقارنة في حالة تم النقر على زر التعديل
elseif (isset($_POST['updateBuying']))
{
    $sql ="Update Buying Set B_Id = $id ,B_Name = '$name', B_Price =$price, B_Cost = $cost , B_Amount = $amount where B_Id=$id";
#إستدعاء دالة العمليات بإرسال أمر التعديل 
    if(Operations($sql))
{ header('location:Buying.php?op=5'); #ارسال رقم الرسالة عند نجاح تنفيذ امر التعديل
if($id>MaxNum(3)){header('location:Buying.php?op=6');}#ارسال رقم الرسالة عندما يكون رقم المستخدم غير موجود 
}
else
{ header('location:Buying.php?op=7'); } }#ارسال رقم الرسالة عند عدم تنفيذ امر التعديل
#مقارنة في حالة تم النقر على زر الحذف
elseif (isset($_POST['deleteBuying']))
{
    $sql ="Delete from Buying where B_Id=$id";
    #إستدعاء دالة العمليات بإرسال أمر الحذف 
if(Operations($sql))
{ header('location:Buying.php?op=8'); }#ارسال رقم الرسالة عند نجاح تنفيذ امر الحذف
else
{ header('location:Buying.php?op=9'); } }#ارسال رقم الرسالة عند عدم تنفيذ امر الحذف
}
else #تابع حلقة الشرط الخارجية
{
    header('location:Buying.php?op=3');#ارسال رقم الرسالة عندما تكون الحقول فارغة
}
?>