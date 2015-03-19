<html>
    <head
    <?php
    require 'NavBar.php';
    require 'ensureUserLoggedIn.php';
    require 'Styles.php';
    require 'Scripts.php';
    require_once 'Manager.php';
    require_once 'Connection.php';
    require_once 'ManagerTableGateway.php';
    ?>

</head>
<body>

    <?php
    if (isset($message)) {
        echo '<p>' . $message . '</p>';
    }
    ?>

    <div>
        <?php
        $id = session_id();
        if ($id == "") {
            session_start();
        }
        require 'ensureUserLoggedIn.php';

        if (!isset($_GET) || !isset($_GET['id'])) {
            die('Invalid request');
        }
        $id = $_GET['id'];

        $connection = Connection::getInstance();
        $gateway = new ManagerTableGateway($connection);

        $statement = $gateway->getManagerById($id);
        ?>
        <div class="col-lg-6 col-lg-push-2 pushDown">
            <table id ="table" border="1" class="col-lg-6 col-lg-push-4">
                <tbody>
                    <?php
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<th>Name</th>'
                    . '<td>' . $row['name'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>Email</th>'
                    . '<td>' . $row['managerEmail'] . '</td>';
                    echo '</tr>';
                    ?>
                </tbody>


            </table>
            <a href="editManagerForm.php?id=<?php echo $row['managerID']; ?>" class="pushDown btn btn-md editEventBTN">
                Edit Event</a>
            <a class="pushDown btn btn-md btn-info" href="deleteManager.php?id=<?php echo $row['managerID']; ?> " >Delete manager</a>

        </div>



    </div>

</body>
</html>
