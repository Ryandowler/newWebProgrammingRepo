<html>
    <head><!--requiring The nessesary elements for this page-->
        <?php
        require 'Styles.php';
        require 'Scripts.php';
        require 'ensureUserLoggedIn.php';
        require 'NavBar.php';
        require_once 'Manager.php';
        require_once 'Connection.php';
        require_once 'ManagerTableGateway.php';
        ?>
    </head>
    <body class="greenBG">
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>
        <div class="mainWrapper">
            <?php
            $connection = Connection::getInstance();
            $gateway = new ManagerTableGateway($connection);

            $statement = $gateway->getManagers();
            /* creating the session */
            $id = session_id();
            /* checking if there is not already a session and if there is start it */
            if ($id == "") {
                session_start();
            }
            //if events session is set add it to the array
            if (!isset($_SESSION['managers'])) {
                $managers = array();
                //hard coding variables into the array through parameters in another page

                $_SESSION['managers'] = $managers;
            } else {
                //making this session events
                $managers = $_SESSION['managers'];
            }
            ?>
            <!DOCTYPE html>
            <!-- error checking -->
            <?php
            if (isset($message)) {
                echo '<p>' . $message . '</p>';
            }
            ?>
            <!-- SCRAP -----------------<div class="otherTablesBox col-lg-3">
                 <h1 class="font2 col-lg-2 col-lg-push-2">Other Tables</h1>
                     <div class="col-lg-2">
                         <table class="displayingOtherTables table-responsive table-condensed ">
 
                             <tr>
                                 <td><img src="img/notepad.png" /></td>
                                 <td><a href = "home.php">Events</a></td>
                             </tr>
                             <tr>
                                 <td><img src="img/manager.png" /></td>
                                 <td><a href = "ManagersTableView.php">Managers</a></td>
                             </tr>
                             <tr>
                                 <td><img src="img/organiser.png" /></td>
                                 <td><a href = "#.php">Organisers</a></td>
                             </tr>
                             <tr>
                                 <td><img src="img/asset.png" /></td>
                                 <td><a href = "#.php">Assets</a></td>
                             </tr>
                             <tr>
                                 <td><img src="img/location.png" /></td>
                                 <td><a href = "#.php">Location</a></td>
                             </tr>
                             <tr>
                                 <td><img src="img/attendee.png" /></td>
                                 <td><a href = "#.php">Attendee</a></td>
                             </tr>
                         </table>
                     </div>
            -->























<div class="">
            <div class="">






                <!--sidebar start-->

                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <p class="centered"><a href="profile.html"><img src="img/Eventer_logo.png" class="col-lg-offset-3 img-responsive"></a></p>
                        <li class="mt">
                            <h3  class="col-lg-offset-2 boldFont">Other Tables</h3>
                            <a href="home.php">
                                <img class="iconPushUp" src="img/notepad.png" />
                                <span class="otherTablesFont">Events</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a  class="active" href="ManagersTableView.php" >
                                <img class="iconPushUp" src="img/manager.png" />
                                <span class="otherTablesFont">Managers</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="#" > 
                                <img class="iconPushUp" src="img/organiser.png" />
                                <span class="otherTablesFont">Organisers</span>
                            </a>  
                        </li>
                        <li class="sub-menu">
                            <a href="#" >
                                <img class="iconPushUp" src="img/asset.png" />
                                <span class="otherTablesFont">Assets</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="#" >
                                <img class="iconPushUp" src="img/location.png" />
                                <span class="otherTablesFont">Location</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="#" >
                                <img class="iconPushUp" src="img/attendee.png" />
                                <span class="otherTablesFont">Attendee</span>
                            </a>
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>

                <!--sidebar end-->
            </div>

            <!--Top bar INFORMATION-->
            <div class="topInfoBar col-lg-12">
                <div class="ghgbgh row mtbox col-lg-offset-1">
                    <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <div class="box1">
                            <div id="some-div">
                                <h3 class="redFont"><img class="iconPushUp2 " src="img/notepad.png" /><text class="col-lg-offset-1">933</text></h3>
                                <span id="some-element">
                                    <ul class="noSytle">
                                        <li><h4>933 Created Since 2010</h4></li>
                                        <li><img src = "img/concert.png" /><text class="col-lg-offset-1">273 Concerts</text></li>
                                        <li><img src = "img/sports.png" /><text class="col-lg-offset-1">350 Sports</text></li>
                                        <li><img src = "img/conferance.png" /><text class="col-lg-offset-1">168 Conference</text></li>
                                        <li><img src = "img/technology.png" /><text class="col-lg-offset-1">142 Technology</text></li>
                                    </ul>

                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <div id="some-div">
                                <h3 class="redFont"><img class="iconPushUp2 " src="img/notepad.png" /><text class="col-lg-offset-1">933</text></h3>
                                <span id="some-element">
                                    <ul class="noSytle">
                                        <li><h4>933 Created Since 2010</h4></li>
                                        <li><img src = "img/concert.png" /><text class="col-lg-offset-1">273 Concerts</text></li>
                                        <li><img src = "img/sports.png" /><text class="col-lg-offset-1">350 Sports</text></li>
                                        <li><img src = "img/conferance.png" /><text class="col-lg-offset-1">168 Conference</text></li>
                                        <li><img src = "img/technology.png" /><text class="col-lg-offset-1">142 Technology</text></li>
                                    </ul>

                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <div id="some-div">
                                <h3 class="redFont"><img class="iconPushUp2 " src="img/notepad.png" /><text class="col-lg-offset-1">933</text></h3>
                                <span id="some-element">
                                    <ul class="noSytle">
                                        <li><h4>933 Created Since 2010</h4></li>
                                        <li><img src = "img/concert.png" /><text class="col-lg-offset-1">273 Concerts</text></li>
                                        <li><img src = "img/sports.png" /><text class="col-lg-offset-1">350 Sports</text></li>
                                        <li><img src = "img/conferance.png" /><text class="col-lg-offset-1">168 Conference</text></li>
                                        <li><img src = "img/technology.png" /><text class="col-lg-offset-1">142 Technology</text></li>
                                    </ul>

                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <div id="some-div">
                                <h3 class="redFont"><img class="iconPushUp2 " src="img/notepad.png" /><text class="col-lg-offset-1">933</text></h3>
                                <span id="some-element">
                                    <ul class="noSytle">
                                        <li><h4>933 Created Since 2010</h4></li>
                                        <li><img src = "img/concert.png" /><text class="col-lg-offset-1">273 Concerts</text></li>
                                        <li><img src = "img/sports.png" /><text class="col-lg-offset-1">350 Sports</text></li>
                                        <li><img src = "img/conferance.png" /><text class="col-lg-offset-1">168 Conference</text></li>
                                        <li><img src = "img/technology.png" /><text class="col-lg-offset-1">142 Technology</text></li>
                                    </ul>

                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <div id="some-div">
                                <h3 class="redFont"><img class="iconPushUp2 " src="img/notepad.png" /><text class="col-lg-offset-1">933</text></h3>
                                <span id="some-element">
                                    <ul class="noSytle ">
                                        <li><h4>933 Created Since 2010</h4></li>
                                        <li><img src = "img/concert.png" /><text class="col-lg-offset-1">273 Concerts</text></li>
                                        <li><img src = "img/sports.png" /><text class="col-lg-offset-1">350 Sports</text></li>
                                        <li><img src = "img/conferance.png" /><text class="col-lg-offset-1">168 Conference</text></li>
                                        <li><img src = "img/technology.png" /><text class="col-lg-offset-1">142 Technology</text></li>
                                    </ul>

                                </span>
                            </div>
                        </div>
                    </div>

                </div><!--Top bar INFORMATION END-->
            </div>
            <!--Managers table Start-->
            <div class=" col-lg-12 col-lg-push-3 pushDown2">
                <form ID="HomeForm" class="col-lg-12" method="POST" action="deleteSelectedManagers.php">
                    <table class ="homeTable table-responsive table-condensed table-striped table-hover  " >
                        <!--<?php
                        $username = $_SESSION['username'];
                        echo '<h4> Welcome, ' . $username . '</h4>';
                        ?>
                        -->
                        <thead>
                            <tr>
                                <th><input type="checkbox" onclick="checkAll(this)"><br></th>
                                <th>ManagerID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <script language="javascript">
                            function checkAll(master) {
                                var checked = master.checked;
                                var col = document.getElementsByTagName("INPUT");
                                for (var i = 0; i < col.length; i++) {
                                    col[i].checked = checked;
                                }
                            }
                        </script>
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<td><input type="checkbox" value="' . $row['managerID'] . '" name="managers[]" /></td>';
                            echo '<td>' . $row['managerID'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['managerEmail'] . '</td>';
                            echo '<td class=" noHover ">'
                            //<a href="somepage.html"><button type="button">Text of Some Page</button></a>
                            . '<a href="viewManager.php?id=' . $row['managerID'] . '"><button type="button" class="btn btn-md btn-info"  ><span class="hidden-xs glyphicon glyphicon-eye-open"></span></button></a> '
                            . '<a href="editManagerForm.php?id=' . $row['managerID'] . '"><button type="button" class="btn btn-md btn-info"><span class="hidden-xs glyphicon glyphicon-wrench"></span></button></a> '
                            . '<a class="deleteManager" <a href="deleteManager.php?id=' . $row['managerID'] . '"><button type="button" class="btn btn-md btn-info"><span class="hidden-xs glyphicon glyphicon-trash"></span></button></a> '
                            . '</td>';
                            echo '</tr>';
                            $row = $statement->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        </tbody>
                    </table>  
                    <table>
                        <tr>
                            <td><input type="submit" class=" deleteSelectedBTN btn btn-md btn-info" name="deleteSelected" value="Delete Selected" /></td>
                            <td><a href="createManagerform.php" class=" col-lg-12 col-lg-push-2 btn btn-md btn-info"> Create Manager</a></td>		 
                        </tr> 
                    </table>
                </form>

            </div>
            <!--Managers table End-->
        </div> 
    </body>
</div>
</html>
