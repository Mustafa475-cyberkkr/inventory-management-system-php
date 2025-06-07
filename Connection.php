<?php
$conn = mysqli_connect("localhost" , "root" , "" ,"YouStoreDB" ) ;
#دالة العمليات على قاعدة البيانات 
function Operations($sql)
{
    global $conn; 
    $query = mysqli_query($conn,$sql);
if($query)
{
   
    return true;
}
else
{
    return false;
}
}
#دالة البحث 
function Search($text,$PageNum){
    global $conn; 
    if($PageNum==1){#مقارنة هل الإستعلام من صفحة المستخدمين
    $sql ="select * from Users Where U_Id ='$text'";
    $query = mysqli_query($conn , $sql);
    $row = mysqli_fetch_array($query);
    if(!empty($row)){
       return $row ;
    }
    }
   else if($PageNum==2){#مقارنة هل الإستعلام من صفحة الأصناف
        $sql ="select * from Prudacts Where P_Id ='$text'";
        $query = mysqli_query($conn , $sql);
        $row = mysqli_fetch_array($query);
        if(!empty($row)){
           return $row ;
        }
        }
   else if($PageNum==3){#مقارنة هل الإستعلام من صفحة المشتريات
            $sql ="select * from Buying Where B_Id ='$text'";
            $query = mysqli_query($conn , $sql);
            $row = mysqli_fetch_array($query);
            if(!empty($row)){
               return $row ;
            }
            }
    else if($PageNum==4){#مقارنة هل الإستعلام من صفحة المبيعات
                $sql ="select * from Selling Where S_Id ='$text'";
                $query = mysqli_query($conn , $sql);
                $row = mysqli_fetch_array($query);
                if(!empty($row)){
                   return $row ;
                }
                }
}
#دالة الحصول على أكبر رقم من جدول المستخدمين 
function MaxNum($PageNum){
    global $conn; 
    #الإستعلام عن اكبر قيمة من جدول المستخدمين
    if($PageNum==1){
    $sql ="select max(U_Id) from Users";
    $query = mysqli_query($conn , $sql);
    $row = mysqli_fetch_array($query);
    return  $row[0];
    }
    #الإستعلام عن اكبر قيمة من جدول الأصناف
    else if($PageNum==2){
        $sql ="select max(P_Id) from Prudacts";
        $query = mysqli_query($conn , $sql);
        $row = mysqli_fetch_array($query);
        return  $row[0];
        }
    #الإستعلام عن اكبر قيمة من جدول المشتريات
    else if($PageNum==3){
        $sql ="select max(B_Id) from Buying";
        $query = mysqli_query($conn , $sql);
        $row = mysqli_fetch_array($query);
        return  $row[0];
        }
}
?>