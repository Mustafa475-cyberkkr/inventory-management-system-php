<?php
session_start(); #فتح الجلسة 
include ('Connection.php'); #تضمين صفحة الإتصال 
#التأكد من عدم فراغ الحقول #حلقة الشرط الخارجية
if (!empty($_POST['prudactId']) & !empty($_POST['prudactName']) & !empty($_POST['amount']))
{
$id = $_POST['prudactId'];
$name = $_POST['prudactName'];
$barcode = $_POST['barcodeNum'];
$amount = $_POST['amount'];
settype($amount,'int');
$note = $_POST['Prudactnote'];
 #مقارنة في حالة تم النقر على زر الإضافة
if(isset($_POST['addPrudacts']))
{

$sql ="Insert into Prudacts (P_Id , P_Name ,P_BarCode ,P_Amount ,P_Note  ) Values ($id,'$name',$barcode,$amount,'$note') ";
#إستدعاء دالة العمليات بإرسال أمر الإضافة 
if(Operations($sql))
{ header('location:Prudacts.php?op=1'); }#ارسال رقم الرسالة عند نجاح تنفيذ امر الإضافة
else
{ header('location:Prudacts.php?op=2'); } 
    
}#ارسال رقم الرسالة عند عدم تنفيذ امر الإضافة

#مقارنة في حالة تم النقر على زر البحث
elseif (isset($_POST['searchPButton']))
{ 
    $text =  $_POST['searchPrudact'];
    $result = Search($text,2);#إستدعاء دالة البحث مع تمرير القيمة المرسلة من حقل البحث 
    if($result){ #التحقق من ان عملية البحث تمت اي توجد بيانات 
    $_SESSION['search'] = $result[0];
    header('location:Prudacts.php');
    }
    else{#في حال لم تتم عملية الإستعلام يتم ارسال رقم العملية لظهور رسالة مناسبة 
        header('location:Prudacts.php?op=4');
    }

}#مقارنة في حالة تم النقر على زر التعديل
elseif (isset($_POST['updatePrudacts']))
{
    $sql ="Update Prudacts Set P_Id = $id ,P_Name = '$name', P_BarCode ='$barcode', P_Amount = '$amount' , P_Note = '$note' WHERE P_Id=$id";
#إستدعاء دالة العمليات بإرسال أمر التعديل 
    if(Operations($sql))
{ header('location:Prudacts.php?op=5'); #ارسال رقم الرسالة عند نجاح تنفيذ امر التعديل
if($id>MaxNum(2)){header('location:Prudacts.php?op=6');}#ارسال رقم الرسالة عندما يكون رقم المستخدم غير موجود 
}
else
{ header('location:Prudacts.php?op=7'); } }#ارسال رقم الرسالة عند عدم تنفيذ امر التعديل
#مقارنة في حالة تم النقر على زر الحذف
elseif (isset($_POST['deletePrudacts']))
{
    $sql ="Delete from Prudacts where P_Id=$id";
    #إستدعاء دالة العمليات بإرسال أمر الحذف 
if(Operations($sql))
{ header('location:Prudacts.php?op=8'); }#ارسال رقم الرسالة عند نجاح تنفيذ امر الحذف
else
{ header('location:Prudacts.php?op=9'); } }#ارسال رقم الرسالة عند عدم تنفيذ امر الحذف
}
else #تابع حلقة الشرط الخارجية
{
    header('location:Prudacts.php?op=3');#ارسال رقم الرسالة عندما تكون الحقول فارغة
}
?>