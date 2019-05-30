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
                    <h4>แก้ไขข้อมูลผู้ใช้</h4>
                    <?php
                        include 'connectdb.php';
                        $star_id = $_REQUEST['star_id'];
                        if(isset($_GET['submit'])){
                            $star_id = $_GET['star_id'];
                            $star_ttl_id = $_GET['star_ttl_id'];
                            $star_fname = $_GET['star_fname'];
                            $star__lanme = $_GET['star__lanme'];
                            $star_nname = $_GET['star_nname'];
                            $star_age = $_GET['star_age'];
                            $star_ig = $_GET['star_ig'];
                            $sql = "update star set";
                            $sql .= "star_ttl_id='$star_ttl_id'star_fname='$star_fname',star__lanme='$star__lanme',star_nname='$star_nname',star_tel='$star_tel',star_ad='$star_ad',star_date='$star_date' ";
                            $sql .="where star_id='$star_id' ";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "แก้ไขข้อมูลผู้ใช้  $star_ttl_id $star_fname $star__lanme $star_nname $star_tel $star_ad $star_date เรียบร้อยแล้ว<br>";
                            echo '<a href="star_list.php">แสดงรายชื่อผู้ใช้ทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="star_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <input type="hIDden" name="star_id" ID="star_id" value="<?php echo "$star_id";?>">
                            <label for="star_ttl_id" class="col-md-2 col-lg-2 control-label">คำนำหน้าชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="star_ttl_id" ID="star_ttl_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from star where star_id='$star_id'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $fstar_ttl_id = $row2['star_ttl_id'];
                                    $fstar_fname = $row2['star_fname'];
                                    $fstar__lanme = $row2['star__lanme'];
                                    $fstar_nname = $row2['star_nname'];
                                    $fstar_age = $row2['star_age'];
                                    $fstar_ig = $row2['star_ig'];
                                    $sql =  "SELECT * FROM title order by ttl_id";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ttl_id'].'"';
                                        if($row['ttl_id']==$fstar_ttl_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['ttl_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="star_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="star_fname" ID="star_fname" class="form-control" 
                                       value="<?php echo $fstar_fname;?>">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="star__lanme" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="star__lanme" ID="star__lanme" class="form-control" 
                                       value="<?php echo $fstar__lanme;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="star_nname" class="col-md-2 col-lg-2 control-label">ชื่อเล่น</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="star_nname" ID="star_nname" class="form-control" 
                                       value="<?php echo $fstar_nname;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="star_age" class="col-md-2 col-lg-2 control-label">อายุ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="varchar" name="star_age" ID="star_age" class="form-control" 
                                       value="<?php echo $fstar_age;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="star_ig" class="col-md-2 col-lg-2 control-label">IG</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="star_ig" ID="star_ig" class="form-control" 
                                       value="<?php echo $fstar_ig;?>">
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