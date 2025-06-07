<?php
session_start(); #فتح الجلسة 
include ('Connection.php'); #تضمين صفحة الإتصال 
#التأكد من عدم فراغ الحقول #حلقة الشرط الخارجية
if (!empty($_POST['sellingId']) & !empty($_POST['sellingName']) & !empty($_POST['sellingPrice']) & !empty($_POST['sellingAmount']) )
{
$id = $_POST['sellingId'];
$name = $_POST['sellingName'];
$price = $_POST['sellingPrice'];
$discount = $_POST['sellingDiscount'];
$amount = $_POST['sellingAmount'];
//settype($amount,'int');#تحويل من نص الى رقم 
$userId = $_SESSION['userId'];
 #مقارنة في حالة تم النقر على زر الإضافة
if(isset($_POST['addSelling']))
{

$sql ="Insert into Selling (S_Id , S_Name ,S_Price ,S_Discount ,S_Amount ,S_U_Id ) Values ($id,'$name',$price,$discount,$amount,$userId) ";
#إستدعاء دالة العمليات بإرسال أمر الإضافة 
if(Operations($sql))
{ header('location:Selling.php?op=1'); 
  //mysqli_query($conn, "Update Prudacts Set P_Amount = 10 where P_Name=$name"); 
}#ارسال رقم الرسالة عند نجاح تنفيذ امر الإضافة
else
{ header('location:Selling.php?op=2'); } }#ارسال رقم الرسالة عند عدم تنفيذ امر الإضافة

#مقارنة في حالة تم النقر على زر البحث
elseif (isset($_POST['searchSButton']))
{ 
    $text =  $_POST['searchSelling'];
    $result = Search($text,4);#إستدعاء دالة البحث مع تمرير القيمة المرسلة من حقل البحث 
    if($result){ #التحقق من ان عملية البحث تمت اي توجد بيانات 
    $_SESSION['search'] = $result[0];
    header('location:Selling.php');
    }
    else{#في حال لم تتم عملية الإستعلام يتم ارسال رقم العملية لظهور رسالة مناسبة 
        header('location:Selling.php?op=4');
    }

}#مقارنة في حالة تم النقر على زر التعديل
elseif (isset($_POST['updateSelling']))
{
    $sql ="Update Selling Set S_Id = $id ,S_Name = '$name',S_Price = $price
    ,S_Discount = $discount,S_Amount = $amount where S_Id=$id";
#إستدعاء دالة العمليات بإرسال أمر التعديل 
    if(Operations($sql))
{ header('location:Selling.php?op=5'); #ارسال رقم الرسالة عند نجاح تنفيذ امر التعديل
if($id>MaxNum(3)){header('location:Selling.php?op=6');}#ارسال رقم الرسالة عندما يكون رقم المستخدم غير موجود 
}
else
{ header('location:Selling.php?op=7'); } }#ارسال رقم الرسالة عند عدم تنفيذ امر التعديل
#مقارنة في حالة تم النقر على زر الحذف
elseif (isset($_POST['deleteSelling']))
{
    $sql ="Delete from Selling where S_Id=$id";
    #إستدعاء دالة العمليات بإرسال أمر الحذف 
if(Operations($sql))
{ header('location:Selling.php?op=8'); }#ارسال رقم الرسالة عند نجاح تنفيذ امر الحذف
else
{ header('location:Selling.php?op=9'); } }#ارسال رقم الرسالة عند عدم تنفيذ امر الحذف
}
else #تابع حلقة الشرط الخارجية
{
    header('location:Selling.php?op=3');#ارسال رقم الرسالة عندما تكون الحقول فارغة
}
?>