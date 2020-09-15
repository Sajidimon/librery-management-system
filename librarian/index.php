    <?php require_once "header.php"; ?>
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <div class="row">

                <?php


                $books_data = mysqli_query($conn, "SELECT * FROM `books` ");
                $books_info = mysqli_num_rows($books_data);

                $books_qty = mysqli_query($conn, "SELECT SUM(`book_qnty`) AS total FROM `books`");
                $qty = mysqli_fetch_assoc($books_qty);

                $books_a_qty = mysqli_query($conn, "SELECT SUM(`available_qnty`) AS total FROM `books` ");
                $a_qty = mysqli_fetch_assoc($books_a_qty);

                ?>
                <!--BOX Style 1-->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                        <a href="manage-books.php">
                            <div class="panel-content">
                                <h1 class="title color-light-1"> <i class="fa fa-book"></i> <?=$books_info.' ('.$qty['total'].' - '.$a_qty['total'].' )'; ?> </h1>
                                <h4 class="subtitle">Total Books</h4>
                            </div>
                        </a>
                    </div>
                </div>

                <?php


                $students_data = mysqli_query($conn, "SELECT * FROM `students` ");
                $students_info = mysqli_num_rows($students_data);
                ?>
                <!--BOX Style 1-->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                        <a href="students.php">
                            <div class="panel-content">
                                <h1 class="title color-light-1"> <i class="fa fa-users"></i> <?= $students_info; ?> </h1>
                                <h4 class="subtitle">Total Students</h4>
                            </div>
                        </a>
                    </div>
                </div>

                <?php


                $librerian_data = mysqli_query($conn, "SELECT * FROM `librerian` ");
                $librerian_info = mysqli_num_rows($librerian_data);
                ?>
                <!--BOX Style 1-->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                        <a href="students.php">
                            <div class="panel-content">
                                <h1 class="title color-light-1"> <i class="fa fa-users"></i> <?= $librerian_info; ?> </h1>
                                <h4 class="subtitle">Total Librerian</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <?php require_once "footer.php"; ?>