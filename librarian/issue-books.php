<?php

require_once "header.php";
require_once "../database.php";

if (isset($_POST['issue_book'])) {
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $book_issue_date = $_POST['book_issue_date'];


    $book_issue = mysqli_query($conn, "INSERT INTO `issue-books`(`student_id`, `book_id`, `book_issue_date`) VALUES ('$student_id', '$book_id', '$book_issue_date')");

    if ($book_issue) {
        $success = "<p class='alert alert-success'>
                    Books isseus successfully
                    <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </p>";
    } else {
        $error = "<p class='alert alert-danger'>
                   sorry! Books not issues!
                <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                <span aria-hidden='true'>&times;</span>
                    </button>
                </p>";
    }
}

?>

<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-book" aria-hidden="true"></i><a href="javascript:avoid(0)">issue book</a></li>
        </ul>
    </div>
</div>

<?php

if (isset($success)) {
    echo $success;
}
if (isset($error)) {
    echo $error;
}

?>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12 col-lg-4 col-sm-offset-4">
        <form action="" method="POST">
            <div class="input-group">
                <select name="student_id" class="form-control">
                    <option value="selected">Select</option>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM `students` WHERE `status` = '1' ");
                    while ($row =  mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?= $row['id'] ?>">
                        <?= ucwords($row['fname'] . ' ' . $row['lname']) . ' - (' . $row['roll'] . ')' ?></option>
                    <?php
                    }
                    ?>
                </select>
                <span class="input-group-btn">
                    <input type="submit" value="Search" name="search" class="btn btn-danger">
                </span>
            </div>
            <?php
            if (isset($_POST['search'])) {
                $id = $_POST['student_id'];
                $result = mysqli_query($conn, "SELECT * FROM `students` WHERE `id` = '$id' AND `status` = '1' ");
                $row = mysqli_fetch_assoc($result);

            ?>

            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="email">Student name</label>
                                    <input type="email" value="<?= ucwords($row['fname'] . ' ' . $row['lname']) ?>"
                                        class="form-control" id="email" readonly>
                                    <input type="hidden" value="<?= $row['id']; ?>" name="student_id">
                                </div>
                                <div class="form-group">
                                    <label for="password">All books list</label>
                                    <select name="book_id" class="form-control">
                                        <option value="selected">Select</option>
                                        <?php
                                            $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `available_qnty` >0 ");
                                            while ($row =  mysqli_fetch_assoc($result)) {
                                            ?>
                                        <option value="<?= $row['id'] ?>">
                                            <?= $row['book_name']; ?>
                                        </option>
                                        <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date">Book issue date</label>
                                    <input type="text" name="book_issue_date" value="<?= date('d-m-y'); ?>"
                                        class="form-control" id="date" readonly>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="issue_book" class="btn btn-primary">Save Book
                                        issue</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php

            }
            ?>
        </form>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php require_once "footer.php"; ?>