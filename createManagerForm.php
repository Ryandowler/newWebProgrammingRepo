<!DOCTYPE html>
<html>
    <head>
        <?php
        require 'Styles.php';
        //require 'Scripts.php';
        require 'NavBar.php';
        require 'ensureUserLoggedIn.php';
        ?>
        <title>Create Manager</title>
    </head>
    <body>
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }

        //Calling in navigation bar, if i need to edit just edit NavBar.php
        //require 'NavBar.php'
        ?>


        <div>

            <h1 class="col-lg-offset-4">Insert Manager Details</h1>
            <form id="createManagerForm" class="well col-lg-5 col-lg-offset-4" action="createManager.php" method="POST">
                <table border="0">
                    <tbody>
                        <!--making table rows to input data-->
                        <tr>
                            <!--table data-->
                            <td>Name</td>
                            <td>
                                <input type="text" class="inputFieldPush form-control" name="name" value="<?php
                                if (isset($_POST) && isset($_POST['name'])) {
                                    echo $_POST['name'];
                                }
                                ?>" />
                                <!--giving the input box an id and errorcode id to call it later to check for errors etc-->
                                <span id="nameError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['name'])) {
                                        echo $errorMessage['name'];
                                    }
// else if (!!isset($errorMessage) && !isset($errorMessage['title'])) {
//     echo $errorMessage['title'];
// }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <!--table data-->
                            <td>Email</td>
                            <td>
                                <input type="text" class="inputFieldPush form-control" name="managerEmail" value="<?php
                                if (isset($_POST) && isset($_POST['managerEmail'])) {
                                    echo $_POST['managerEmail'];
                                }
                                ?>" />
                                <!--giving the input box an id and errorcode id to call it later to check for errors etc-->
                                <span id="managerEmailError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['managerEmail'])) {
                                        echo $errorMessage['managerEmail'];
                                    }
// else if (!!isset($errorMessage) && !isset($errorMessage['title'])) {
//     echo $errorMessage['title'];
// }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><!--creating the submit button that will be working with creating the event -->
                                <input type="submit" value="Create Manager" class="btn btn-md createEventBTNs" name="createManager" />
                                <!--calling an function that will cancel a event -->
                                <input type="button" value="Cancel" class="btn btn-md createEventBTNs" name="cancel" onclick ="document.location.href = 'ManagerstableView.php'" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
































        </div>

</body>
</html>
