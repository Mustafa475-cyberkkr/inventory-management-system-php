<!--الصفحة الرئيسية-->
<?php
#إنشاء الجلسة تكون بداية كل صفحة 
 session_start(); 
 include('Connection.php');
 ?>
 <!--كود جافا سكربت -->
 <script>
// الوقت بالملي ثانية لذلك يجب ضرب عدد الثواني في 1000
setTimeout(function(){
    window.location.href = "index.php"; // اسم ملف تسجيل الخروج اليه وهو صفحة تسجيل الدخول
}, 300000); // 5 دقيقة = (300 ثانية * 1000)
//دالة تستخدم لجلب الوقت في كل ثانية
function showTime() {
			var date = new Date(); // إنشاء كائن Date
			var hours = date.getHours(); // الحصول على الساعات الحالية
			var minutes = date.getMinutes(); // الحصول على الدقائق الحالية
			var seconds = date.getSeconds(); // الحصول على الثواني الحالية
			var time = hours + ":" + minutes + ":" + seconds; // تجميع الوقت
			document.getElementById("clock").innerText = time; // إظهار الوقت في عنصر HTML محدد
			return setTimeout(showTime, 1000); // تحديث الوقت كل ثانية واحدة
		}
</script>
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
<body dir="rtl" onload="showTime()">
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
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="Home.php">
                           <img width="36px" src="The Elements OF Project/icon home-02.png" /> الرئيسية</a></li>
                        
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="Selling.php">
                           <img width="35px" src="The Elements OF Project/icon seles-02.png" /> مبيعات</a></li>
                       
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="Buying.php"> 
                          <img width="29px" src="The Elements OF Project/icon buying-02.png" /> مشتريات</a></li>

                         <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="prudacts.php"> 
                          <img width="35px" src="The Elements OF Project/icon prudact-02.png" /> أصناف</a></li>
                       
                          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="Users.php"> 
                            <img width="36px" src="The Elements OF Project/icon users-02.png" /> مستخدمين</a></li> 
                         
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
         <div  style="background-color: #176EA3; height: 85px; width: auto;">
        <h1 style="margin-top: 5px; padding-top: 20px; text-align: center; color: whitesmoke;">الصفحة الرئيسية</h1> <br><br>
         </div>
         <br><br>
         <!--إظهار رسالة ترحيبية -->
         <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong> <?php
            echo $_SESSION['userName']; #إستقبال اسم المستخدم المخزن في الجلسة 
            ?>
           </strong> مرحباً بك في موقع يوستور
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
         <!--إظهار بيانات مثل المدة والعمليات -->
           <center>
            <div class="card mb-3" style="max-width: 940px; padding-left: 100px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img width="180px" src="The Elements OF Project/icon user state-02.png" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">بيانات المستخدم الحالي :</h5>
                      <p class="card-text">
                      
  
<ul  class="list-group">
  <li class="list-group-item d-flex  align-items-center">
  <font size="4" color="#176EA3" face=" Questv1">اسم المستخدم :&nbsp;&nbsp;&nbsp;</font> <font size="4" > <?php /*طباعة تاريخ الآن*/  echo $_SESSION['userName']; ?></font>
  </li>
  <li class="list-group-item d-flex align-items-center">
  <font size="4" color="#176EA3" face=" Questv1">حالة المستخدم :&nbsp;&nbsp;&nbsp;</font> <font size="4" > <?php /*طباعة تاريخ الآن*/  echo $_SESSION['userState']; ?></font>
</ul>

                      </p>
                      <p class="card-text"><small class="text-muted">***</small></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card mb-3" style="max-width: 940px; padding-left: 100px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img width="180px" src="The Elements OF Project/icon duration-02.png" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">مدة الإستخدام :</h5>
                      <p class="card-text">

                      <ul  class="list-group ">
  <li class="list-group-item d-flex  align-items-center">
  <font  size="4" color="#176EA3" face=" Questv1"><div id="clock"><?php $timeNow = date("h:i:s") ; ?></div></font> 
  </li>
</ul>

                      </p>
                      <p class="card-text"><small class="text-muted">***</small></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card mb-3" style="max-width: 940px; padding-left: 100px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img id="SellesId" width="180px" src="The Elements OF Project/icon seles color-02.png" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">بيانات عمليات البيع والشراء:</h5>
                      <p class="card-text">

                      <ul  class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
   عدد عمليات الشراء الذي تمت
    <span class="badge badge-primary badge-pill"><?php $query= mysqli_query($conn,"select count(B_Id) from Buying"); 
    $row = mysqli_fetch_array($query); echo $row[0];?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  عدد عمليات الـبيع الذي تمت
    <span class="badge badge-primary badge-pill">
      <?php $query= mysqli_query($conn,"select count(S_Id) from Selling"); $row = mysqli_fetch_array($query); 
      echo $row[0];?></span>
</ul>

                      </p>
                      <p class="card-text"><small class="text-muted">***</small></p>
                    </div>
                  </div>
                </div>
              </div>
            </center>
            <br><br>
        
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
                        <h4 class="text-uppercase mb-2">للتواصل بـ YourStore</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">العملية</h4>
                        <p class="lead mb-0">
                           <span  class="border border-primary  ">الرئيسية</span>
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