<!--صفحة تسجيل الدخول-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-تسجيل الدخول</title>
    <!--تضمين مكتبة البوتستراب-->
    <link href="CSS/bootstrap.min.css" rel="stylesheet" />
    <link href="CSS/styles.css" rel="stylesheet" />
    <!--إضافة ايقونة الصفحة-->
    <link rel="icon" href="The Elements OF Project/icon user state-02.png" type="image/X-icon">
</head>
<body>
    <!--عنوان صفحة الدخول -->
    <div style="background-color: #2c3e50; height: 100px;">
    <h2 style=" padding-top: 20px; text-align: center; color: whitesmoke;"> تسجيل الدخول الى متجر <font size="10" color="#09C7D9" face="Ghalam1">يوستور</font> </h2> <br><br>
    </div>
    <!--حاوية تسجيل الدخول-->
    <section class="vh-100" style="background-color: #176EA3;  ">
        <div class="container py-5 h-100" >
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <!--شعار يو ستور -->
                    <img width="230px" 
                    src="The Elements OF Project/Logo YourStore Project - شعار مشروع يوستور color-06.png" />
                    <br><br><br><br>
                  <form action="Login.php" method="post">
                  <div class="form-outline mb-4">
                    <input type="text" id="typeEmailX-2" name="userName" 
                    class="form-control form-control-lg" placeholder="اسم المستخدم" />
                    
                  </div>
      
                  <div class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" name="password"
                     class="form-control form-control-lg" placeholder="كلمة المرور" />
                    
                  </div>
      
                  <!-- Checkbox -->
                  <div class="form-check d-flex justify-content-start mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                    <label class="form-check-label" for="form1Example3"> Show password </label>
                  </div>
                  <!--إظهار الخطأ-->
                   <?php
                    //مقارنة قيمة المتغير error لطباعة الرسالة المناسبة 
                    if(@$_GET['error'] == 1)
                    {
                      //طباعة الرسالة 
                      echo "
                      <div class='alert alert-danger' role='alert'>
                      خطأ .. اسم المستخدم أو كلمة المرور غير صحيح!
                      </div> " ;
                      
                    }
                    else if(@$_GET['error'] == 2) { 
                      //طباعة الرسالة
                      echo "
                      <div class='alert alert-warning' role='alert'>
                      خطأ ..لايمكن أن تكون الحقول فارغة!
                      </div> " ;
                    }
                   ?>

                  <input class="btn btn-primary btn-lg btn-block" name="login" type="submit" value="Login"/> <br><br>
                  <p class="small mb-5 pb-lg-2"><a class="text-black-50" href="#!">Forgot password?</a></p>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>