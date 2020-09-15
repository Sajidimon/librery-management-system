 <?php
    require_once "header.php";
    require_once "../database.php";

    ?>


 <div class="content-header">
     <!-- leftside content header -->
     <div class="leftside-content-header">
         <ul class="breadcrumbs">
             <li><i class="fa fa-book" aria-hidden="true"></i><a href="#">All books</a></li>
         </ul>
     </div>
 </div>
 <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
 <div class="row animated fadeInUp">
     <div class="col-sm-12">
         <div class="panel">
             <div class="panel-content">
                 <form action="" method="POST">
                     <div class="row pt-md">
                         <div class="form-group col-sm-9 col-lg-10">
                             <span class="input-with-icon">
                                 <input type="text" name="input_search" class="form-control" id="lefticon" placeholder="Search" required>
                                 <i class="fa fa-search"></i>
                             </span>
                         </div>
                         <div class="form-group col-sm-3  col-lg-2 ">
                             <button type="submit" name="book_search" class="btn btn-primary btn-block">Search</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>

     <?php

        if (isset($_POST['book_search'])) {
            $input_search = $_POST['input_search'];

        ?>

         <div class="col-sm-12">
             <div class="panel">
                 <div class="panel-content">
                     <div class="row">
                         <?php
                            $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `book_name` LIKE '%$input_search%' ");

                            $no_result = mysqli_num_rows($result);

                            if ($no_result > 0) {
                            ?>
                             <?php


                                while ($row = mysqli_fetch_assoc($result)) { ?>

                                 <div class="col-md-3">
                                     <img style="width: 130px; height:130px;" src="../images/<?= $row['book_image'] ?>" alt="">
                                     <p>Book name : <b><?= $row['book_name'] ?></b></p>
                                     <span>Book available : <b><?= $row['book_qnty'] ?></b></span>
                                 </div>

                             <?php } ?>
                         <?php
                            } else {
                                echo "<h2 class='text-center'>Sorry! Book not found. Try another words</h2>";
                            } ?>
                     </div>
                 </div>
             </div>
         </div>

     <?php } else { ?>

         <div class="col-sm-12">
             <div class="panel">
                 <div class="panel-content">
                     <div class="row">
                         <?php
                            $result = mysqli_query($conn, "SELECT * FROM `books` ");
                            while ($row = mysqli_fetch_assoc($result)) { ?>

                             <div class="col-md-3">
                                 <img style="width: 130px; height:130px;" src="../images/<?= $row['book_image'] ?>" alt="">
                                 <p>Book name : <b><?= $row['book_name'] ?></b></p>
                                 <span>Book available : <b><?= $row['book_qnty'] ?></b></span>
                             </div>

                         <?php } ?>

                     </div>
                 </div>
             </div>
         </div>


     <?php  } ?>


 </div>

 <?php require_once "footer.php"; ?>