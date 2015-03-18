<?php
require_once 'Manager.php';
require_once 'Connection.php';
require_once 'ManagerTableGateway.php';
require 'ensureUserLoggedIn.php';
require 'Styles.php';
require 'Scripts.php';
require 'NavBar.php';
$id = session_id();
if ($id == "") {
    session_start();
}

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new ManagerTableGateway($connection);

$statement = $gateway->getManagerById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Edit Manager Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <div>
            <div>
                <div id="table">
                    <form id="editManagerForm" name="editManagerForm" action="editManager.php" method="POST">

                        <input type="hidden" name="managerID" value="<?php echo $id; ?>" />
                        <table border="0">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                        <input type="text" name="name" value="<?php
                                        if (isset($_POST) && isset($_POST['name'])) {
                                            echo $_POST['name'];
                                        } else {
                                            echo $row['name'];
                                        }
                                        ?>" />
                                        <span id="nameError" class="error">
                                            <?php
                                            if (isset($errorMessage) && isset($errorMessage['name'])) {
                                                echo $errorMessage['name'];
                                            }
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input type="text" name="managerEmail" value="<?php
                                        if (isset($_POST) && isset($_POST['managerEmail'])) {
                                            echo $_POST['managerEmail'];
                                        } else {
                                            echo $row['managerEmail'];
                                        }
                                        ?>" />
                                        <span id="managerEmailError" class="error">
                                            <?php
                                            if (isset($errorMessage) && isset($errorMessage['managerEmail'])) {
                                                echo $errorMessage['managerEmail'];
                                            }
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" value="Update Manager" name="updateManager" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>