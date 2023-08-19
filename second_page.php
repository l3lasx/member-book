<?php

include("./dbconnnect.php");

if (isset($_POST["search"])) {
    $query = $_POST["search"];

    $sql = "SELECT * FROM member WHERE mid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $query);
    $stmt->execute();
    $result = $stmt->get_result();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Book</title>

    <link rel="stylesheet" href="style/general.css">
    <link rel="stylesheet" href="style/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="row">
        <!-- left side side bar -->
        <div class="col-2 position-fixed top-0 bottom-0 start-0 border-end" style="right: 255px; padding-top: 20px;">
            <div class="container d-flex align-items-start flex-column">
                <div class="row logo">
                    Member List
                </div>

                <a href="index.php" class="w-100 text-dark text-decoration-none">
                    <div class="row rounded icon">
                        <button type="button" class="btn btn-primary w-100 d-flex text-dark" style="background:none; border: none;">
                            <div>
                                <i class="fa-solid fa-house" style="color: #030303;"></i>
                            </div>
                            <div>
                                Home
                            </div>
                        </button>
                    </div>
                </a>


                <div class="row w-100 icon">
                    <button type="button" class="btn btn-primary w-100 d-flex text-dark" data-bs-toggle="modal" data-bs-target="#add_member" style="background:none; border: none;">
                        <div>
                            <i class="fa-solid fa-user-plus" style="color: #000000;"></i>
                        </div>
                        <div>
                            Add
                        </div>
                    </button>
                </div>

                <div class="row w-100 icon">
                    <button type="button" class="btn btn-primary w-100 d-flex text-dark" style="background:none; border: none;">
                        <div>
                            <img src="https://i.ytimg.com/vi/zPyJrH4F748/maxresdefault.jpg" class="rounded-circle profile-custom">
                        </div>
                        <div>
                            Profile
                        </div>
                    </button>
                </div>

                <div class="row d-flex jusify-content-space-between burger-bt">
                    <div class="col burger-icon">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="col">
                        More
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal add member -->
        <div class="modal fade" id="add_member" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="add.php" method="post" style="width: 100%;">
                        <div class="modal-body">
                            <!-- label -->
                            <div>
                                <h3>
                                    Add User Page
                                </h3>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" id="fname" placeholder="Enter First name" name="fname">
                                        <label for="fname">First name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mt-3 mb-3">
                                        <input type="text" class="form-control" id="lname" placeholder="Enter Last name" name="lname">
                                        <label for="lname">Last name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mt-3 mb-3">
                                        <input type="text" class="form-control" id="nname" placeholder="Enter Nick name" name="nname">
                                        <label for="nname">Nick name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mt-3 mb-3">
                                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone number" name="phone">
                                        <label for="phone">Phone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" id="url" placeholder="Enter Url" name="url">
                                <label for="url">Url Profile</label>
                            </div>

                            <!-- next and back bt -->
                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="insert-member">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php
        while ($row = $result->fetch_assoc()) {
        ?>


            <!-- Modal del member-->
            <div class="modal fade" id="del_member" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="delete.php" method="post" style="width: 100%;">
                            <div class="modal-body">
                                <!-- label -->
                                <div>
                                    <h3>
                                        Warning!!!!
                                    </h3>
                                </div>
                                <div>
                                    Are you sure you want to remove this from your table?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary" value="<?=$row["mid"]?>" name="del-member">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal edit member-->
            <div class="modal fade" id="edit_member" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="edit.php" method="post" style="width: 100%;">
                            <div class="modal-body">
                                <!-- label -->
                                <div>
                                    <h4>
                                        You can click on each of fields, to update your information.
                                    </h4>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3 mt-3">
                                            <input type="text" class="form-control" id="fname" placeholder="Enter First name" name="fname" value="<?=$row["firstName"]?>">
                                            <label for="fname">First name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mt-3 mb-3">
                                            <input type="text" class="form-control" id="lname" placeholder="Enter Last name" name="lname" value="<?=$row["lastName"]?>">
                                            <label for="lname">Last name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mt-3 mb-3">
                                            <input type="text" class="form-control" id="nname" placeholder="Enter Nick name" name="nname" value="<?=$row["nickName"]?>">
                                            <label for="nname">Nick name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mt-3 mb-3">
                                            <input type="text" class="form-control" id="phone" placeholder="Enter Phone number" name="phone" value="<?=$row["phone"]?>">
                                            <label for="phone">Phone</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?=$row["email"]?>"">
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="url" placeholder="Enter Url" name="url" value="<?=$row["url"]?>">
                                    <label for="url">Url Profile</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Closed</button>
                                <button type="submit" class="btn btn-primary" value="<?= $row["mid"] ?>" name="edit-member">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- right side content -->
            <div class="col-10 position-fixed top-0 end-0 bottom-0" style="margin-top: 20px;">
                <div class="container d-flex justify-content-end">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center justify-content-center">
                            <form action="search.php" method="post">
                                <input type="text" name="search" placeholder="Search" style="
                        outline:none;
                        padding: 3px 12px;
                        margin-right: -3.5px;
                        border: 1px solid gray;
                        border-radius: 20px;
                        ">
                                <button class="search-icon" type="submit" style="
                        border: none;
                        padding: 5.5px 12px;
                        border-top-right-radius: 20px 20px;
                        border-bottom-right-radius: 20px 20px;
                        background-color: white;
                        ">
                                    <i class="fa-solid fa-magnifying-glass" style="color: #000000;">
                                    </i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container postion-relative shadow-none rounded border" style="height: 800px; padding-left: 0; padding-right: 0;">





                    <div class="p-3" style="display: flex; justify-content: space-between;">
                        <div class="col d-flex justify-content-center align-items-center">
                            <a href="<?= $row["url"] ?>" target="_blank">
                                <img class="rounded-circle shadow p-2 bg-body rounded" style="width: 200px; height: 200px; object-fit: cover;" src="<?= $row["url"] ?>">
                            </a>
                        </div>
                    </div>

                    <div class="container p-3">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="fname" placeholder="Enter First name" name="fname" value="<?= $row["firstName"] ?>">
                                    <label for="fname">First name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="lname" placeholder="Enter Last name" name="lname" value="<?= $row["lastName"] ?>">
                                    <label for="lname">Last name</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="nname" placeholder="Enter Nick name" name="nname" value="<?= $row["nickName"] ?>">
                                    <label for="nname">Nick name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone number" name="phone" value="<?= $row["phone"] ?>">
                                    <label for="phone">Phone</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?= $row["email"] ?>">
                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="container shadow p-4 bg-body rounded" style="width: 500px;">
                        <div class="row d-flex justify-content-around align-items-center">
                            <div class="col">
                                <button type="button" class="btn btn-primary w-100 d-flex justify-content-center text-white" data-bs-toggle="modal" data-bs-target="#edit_member">
                                    <div>Edit</div>
                                    <div>
                                        <i class="fa-solid fa-pen-to-square" style="margin-left: 5px;"></i>
                                    </div>
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-danger w-100 d-flex justify-content-center text-white" data-bs-toggle="modal" data-bs-target="#del_member">
                                    <div>Delete</div>
                                    <div>
                                        <i class="fa-solid fa-delete-left" style="margin-left: 5px;"></i>
                                    </div>
                                </button>
                            </div>
                        </div>

                    </div>
                <?php
            }
                ?>
                </div>


                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>