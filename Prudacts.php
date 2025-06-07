<!--صفحة الأصناف-->
<?php
session_start(); #فتح الجلسة
include('Connection.php');#تضمين صفحة الإتصال والعمليات
?>
<!--كود HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUSTORE-يو ستور</title>
    <!--تضمين مكتبة البوتستراب-->
        <link href="CSS/bootstrap.min.css" rel="stylesheet" />
        <link href="CSS/styles.css" rel="stylesheet" />
    <!--تحديد ايقونة الصفحة الرئيسية-->
    <link rel="icon" href="The Elements OF Project/Logo YourStore Project - icon-02.png" type="image/X-icon" />
    <!--تضمين ملف جافا سكربت-->
    <script src="js/scripts.js"></script>
    <!--تضمين ملفات جافا سكربت خاصة ب بوتستراب-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body dir="rtl">
     <!-- Navigationقائمة التنقل بين الصفحات-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand " href="#page-top"><img width="120px" src="The Elements OF Project/Logo YourStore Project - شعار مشروع يوستورابيض-06.png" /></a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button> 
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-center">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="Home.php"> <img width="36px" src="The Elements OF Project/icon home-02.png" /> الرئيسية</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#SellesId"> <img width="35px" src="The Elements OF Project/icon seles-02.png" /> مبيعات</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="Buying.php"> <img width="29px" src="The Elements OF Project/icon buying-02.png" /> مشتريات</a></li>
                         <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact"> <img width="35px" src="The Elements OF Project/icon prudact-02.png" /> أصناف</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="Users.php"> <img width="36px" src="The Elements OF Project/icon users-02.png" /> مستخدمين</a></li> 
                          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                          <button  class="btn btn-primary btn-xxl enable"  id="LogOutsButton" type="submit">تسجيل الخروج</button> <img width="36px" src="The Elements OF Project/icon logOut-02.png" />
                        </a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact"><span class="border border-primary"><img width="36px" src="The Elements OF Project/icon users-02.png"  /></span> </a></li> 
                    </ul>
                </div>
            </div>
        </nav>
        <br id="page-top"> <br> <br> <br>
        <!--عنوان الصفحة الرئيسية -->
         <div  style=" background-color: #176EA3; height: 85px; width: auto;">
        <h1 style="margin-top: 5px; padding-top: 20px; text-align: center; color: whitesmoke;"> الأصــنـــاف</h1> <br><br>
         </div>
        
         <!--فورم بيانات الأصناف -->
         <div class="container-sm"><br>
            <form action="PrudactsOp.php" method="post">
              <center>
                <!--حقل البحث في الأصناف-->
            <div  class="form-group row">
            <button style="border-radius: 20px;" type="submit" class="btn btn-info btn-sm col-md-1" 
            <?php 
               $_SESSION['search']=2;
            #كود معرفة رقم الصنف للبحث 
            if(isset($_SESSION['search'])){
            $id =@$_SESSION['search'];#استقبال رقم الصنف للبحث
             $result = Search($id,2); #استدعاء دالة البحث حسب رقم الصنف ورقم الصفحة
            ?> 
            name="searchPButton">بحث</button>
            <div class="col-sm-6">
            <input style="border-radius: 20px;" type="text" name="searchPrudact" class="form-control  form-control-sm" id="colFormLabelSm" placeholder="بحث">
             </div></center>

                <div class="form-row">
                  <div class="form-group col-md-1">
                    <label for="inputEmail4"> رقم ID :</label>
                    <input type="text" value=" <?php echo $result[0];?>" class="form-control" name="prudactId"
                     id="userId">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="inputPassword4">اسم الصنف  :</label>
                    <input type="text" value=" <?php echo $result[1];?>" class="form-control" name="prudactName" id="name">
                  </div>
                  <div class="form-group col-md-3 ">
                    <label for="inputAddress">رقم الباركود :</label>
                    <input type="text" value=" <?php echo $result[2];?>" class="form-control" name="barcodeNum" id="userPhone" placeholder=" *** *** ***">
                  </div>
                  <div class="form-group col-md-3">
                      <label for="inputEmail4">  الكمية :</label>
                      <input type="text" value="<?php echo $result[3];?>" class="form-control" name="amount" id="userName">
                    </div>
                </div>
                
                <div class="form-row">
                    
                    <div class="form-group col-md-12">
                      <label for="inputPassword4"> ملاحظات :</label>
                      <textarea class="form-control " id="exampleFormControlTextarea1" name="Prudactnote" rows="2"><?php echo $result[4];}?></textarea>
                    </div>
                   
                  </div><br>
                   <!--إظهار رسالة العملية-->
         <?php
                    //مقارنة قيمة المتغير error لطباعة الرسالة المناسبة 
                    if(@$_GET['op'] == 1)
                    {
                      //طباعة رسالة عند نجاح الإضافة 
                      echo "
                      <div class='alert alert-success' role='alert'>
                      تم إضافة الصنف بنجاح
                      </div> " ;
                      
                    }
                    else if(@$_GET['op'] == 2) { 
                      //طباعة عند حدوث خطأ في ادخال البيانات
                      echo "
                      <div class='alert alert-danger' role='alert'>
                      خطأ .قد يكون اسم المستخدم موجود بالفعل!
                      </div> " ;
                    }
                    else if(@$_GET['op'] == 3) { 
                      //طباعة رسالة عندما تكون الحقول فارغة
                      echo "
                      <div class='alert alert-info' role='alert'>
                      خطأ .يجب ملئ الحقول بالبيانات!
                      </div> " ;
                    }
                    else if(@$_GET['op'] == 4) {
                       //طباعة رسالة لاتوجد بيانات بهذا الرقم
                       echo "
                       <div class='alert alert-danger' role='alert'>
                       خطأ . لاتوجد بيانات صنف بهذا الرقم !
                       </div> " ;
                    }
                    else if(@$_GET['op'] == 5) {
                      //طباعة رسالة تم التعديل
                      echo "
                      <div class='alert alert-success' role='alert'>
                     تم التعديل بنجاح 
                      </div> " ;
                   }
                   else if(@$_GET['op'] == 6) {
                    //طباعة رسالة تم التعديل
                    echo "
                    <div class='alert alert-danger' role='alert'>
                   لايمكن تعديل بيانات غير موجودة
                    </div> " ;
                 }
                 else if(@$_GET['op'] == 8) {
                  //طباعة رسالة تم الحذف بنجاح
                  echo "
                  <div class='alert alert-success' role='alert'>
                 تم حذف الصنف بنجاح 
                  </div> " ;
               }
                    else {}
                   ?>
                  <!--أزرار العلميات-->
                  <center>
                <button type="submit" name="addPrudacts" class="btn btn-success col-md-2">إضـافـة</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" name="updatePrudacts" class="btn btn-warning col-md-2">تعديل</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" name="deletePrudacts" class="btn btn-danger col-md-2">حــذف</button>
                 </center>
              </form>
              <br>
         </div>
         <hr style="">
              <!--جدول بيانات المستخدمين -->
      <div class="container-sm ">
       <!--لائحة توضيحية بعرض البيانات -->
       <div  style="background-color: #176EA3; height: 40px; width: auto;">
            <h5 style="margin-top: 10px; padding-top: 5px; text-align: center; color: whitesmoke;"> عرض بيانات الأصنـــاف</h5> 
             </div>

        <table class="table table-bordered table-hover ">
            <thead class="">
              <tr class="table-info">
                <th scope="col">ID</th>
                <th scope="col">اسم الصنف</th>
                <th scope="col">رقم الباركود</th>
                <th scope="col"> الكمية</th>
                <th scope="col"> ملاحظات</th>
              </tr>
              <!--جلب بيانات المستخدمين من قاعدة البيانات-->
              <?php
            echo "</thead>";
            echo " <tbody>";
            $query = mysqli_query($conn,"select * from Prudacts ");
            while($row = mysqli_fetch_array($query))
            {
              echo"<tr>";
            echo"<td>$row[0]</td>";
            echo"<td>$row[1]</td>";
            echo"<td>$row[2]</td>";
            echo"<td>$row[3]</td>";
            echo"<td>$row[4]</td>";
            echo"<tr>";
            }
            echo"</tbody> </table> ";
          ?>
      </div>
             
             <br>
         <!-- Footer شريط الحالة -->
         <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">التاريخ </h4>
                        <p class="lead mb-0">
                            <span  class="border border-primary  "><?php /*طباعة تاريخ الآن*/  echo gmdate("Y/m/d"); ?></span>
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-2"> اسم المستخدم</h4>
                        <p class="lead mb-0">
                            <span  class="border border-primary  "><?php /*طباعة تاريخ الآن*/  echo $_SESSION['userName']; ?></span>
                        </p>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">العملية</h4>
                        <p class="lead mb-0">
                           <span  class="border border-primary  ">الأصــنـــاف</span>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>جميع الحقوق محفوظة لموقع "يوستور" 2023</small></div>
        </div>
</body>
</html>