<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1">
        <title>Project 6015261014</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include indivIDual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: cornflowerblue;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h4>เพิ่มข้อมูลผู้ใช้</h4>
                    <?php
                        if(isset($_GET['submit'])){
                            $star_ttl_id = $_GET['star_ttl_id'];
                            $star_fname = $_GET['star_fname'];
                            $star_lname = $_GET['star_lname'];
                            $star_nname = $_GET['star_nname'];
                            $star_age = $_GET['star_age'];
                            $star_ig = $_GET['star_ig'];
                            $sql = "insert into star";
                            $sql .= " values (null ,'$star_ttl_id','$star_fname','$star_lname','$star_nname','$star_age','$star_ig')";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มผู้ใช้  $star_ttl_id $star_fname $star_lname $star_age $star_ig เรียบร้อยแล้ว<br>";
                            echo '<a href="star_list.php">แสดงรายชื่อผู้ใช้ทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="star_igd" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="star_ttl_id" class="col-md-2 col-lg-2 control-label">คำนำหน้าชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="star_ttl_id" ID="star_ttl_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM title order by ttl_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ttl_id'] . '">';
                                        echo $row['ttl_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="star_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="star_fname" ID="star_fname" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="star_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="star_lname" ID="star_lname" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="star_nname" class="col-md-2 col-lg-2 control-label">ชื่อเล่น</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="star_nname" ID="star_nname" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="star_age" class="col-md-2 col-lg-2 control-label">อายุ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="star_age" ID="star_age" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="star_ig" class="col-md-2 col-lg-2 control-label">IG</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="star_ig" ID="star_ig" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div> 
                    </form>
                    <?php
                        }
                    ?>
                </div>    
            </div>
            <div class="row">
                <address>คณะคอมพิวเตอร์ศึกษาปี 2 </address>
            </div>
        </div>    
    </body>
</html>