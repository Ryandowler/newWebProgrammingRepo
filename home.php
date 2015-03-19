<html>
    <head><!--requiring The nessesary elements for this page-->
        <?php
        require 'Styles.php';
        require 'Scripts.php';
        require 'ensureUserLoggedIn.php';
        require 'NavBar.php';
        require_once 'Event.php';
        require_once 'Connection.php';
        require_once 'EventTableGateway.php';
        ?>
    </head>
    <body class="greenBG">
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>
        <div>
            <?php
            $connection = Connection::getInstance();
            $gateway = new EventTableGateway($connection);

            $statement = $gateway->getEvents();
            /* creating the session */
            $id = session_id();
            /* checking if there is not already a session and if there is start it */
            if ($id == "") {
                session_start();
            }
            //if events session is set add it to the array
            if (!isset($_SESSION['events'])) {
                $events = array();
                //hard coding variables into the array through parameters in another page

                $_SESSION['events'] = $events;
            } else {
                //making this session events
                $events = $_SESSION['events'];
            }
            ?>
            <!DOCTYPE html>
            <!-- error checking -->
            <?php
            if (isset($message)) {
                echo '<p>' . $message . '</p>';
            }
            ?>
            <!--
            <div class="col-lg-4">
                <div class="otherTablesBox col-lg-5">
                    <h1>Other Tables</h1>
                    <div class="col-lg-2">
                        <table class="displayingOtherTables table-responsive table-condensed">
                            
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
                </div>
            </div>
            -->
            
            
            
            
            
                      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="img/Eventer_logo.png" class="col-lg-offset-3 img-responsive"></a></p>

                  <li class="mt">
                      <h3  class="col-lg-offset-2 boldFont">Other Tables</h3>
                      <a class="active" href="home.php">
                           
                         
                          <img class="iconPushUp" src="img/notepad.png" />
                          <span class="otherTablesFont">Events</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="ManagersTableView.php" >
                         
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
      </aside>
      <!--sidebar end-->
            
            
            
            
            <div class="col-lg-8 col-lg-offset-3">
                <div class="hidden-lg pushDown"> </div>
                <form ID="HomeForm" class="col-lg-12 col-xs-2" method="POST" action="deleteSelectedEvents.php">
                    <table class ="homeTable table-responsive table-condensed table-striped table-hover  " >
                        <!--<?php
                        $username = $_SESSION['username'];
                        echo '<h4> Welcome, ' . $username . '</h4>';
                        ?>
                        -->
                        <thead>
                            <tr id="bleh">
                                <th><input type="checkbox" onclick="checkAll(this)"><br></th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="thPush">Start Date</th>
                                <th class="thPush">End Date </th>
                                <th>Time</th>
                                <th>Max Attendees</th>
                                <th>Cost</th>
                                <th>Manager ID</th>
                                <th  class="col-lg-3">Options</th>
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

                            echo '<td><input type="checkbox" value="' . $row['eventID'] . '" name="events[]" /></td>';
                            echo '<td>' . $row['eventID'] . '</td>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '<td >' . $row['startDate'] . '</td>';
                            echo '<td>' . $row['endDate'] . '</td>';
                            echo '<td>' . $row['time'] . '</td>';
                            echo '<td>' . $row['maxAttendees'] . '</td>';
                            echo '<td>' . $row['cost'] . '</td>';
                            echo '<td>' . $row['managerID'] . '</td>';

                            echo '<td class=" noHover ">'
                            //<a href="somepage.html"><button type="button">Text of Some Page</button></a>
                            . '<a href="viewEvent.php?id=' . $row['eventID'] . '"><button type="button" class="btn btn-md btn-info"  ><span class="hidden-xs glyphicon glyphicon-eye-open"></span></button></a> '
                            . '<a href="editEventForm.php?id=' . $row['eventID'] . '"><button type="button" class="btn btn-md btn-info"  ><span class="hidden-xs glyphicon glyphicon-wrench"></span></button></a> '
                            . '<a class="deleteEvent" <a href="deleteEvent.php?id=' . $row['eventID'] . '"><button type="button" class="btn btn-md btn-info"  ><span class="hidden-xs glyphicon glyphicon-trash"></span></button></a> '
                            
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
                            <td><a href="createEventForm.php" class=" col-lg-12 col-lg-push-2 btn btn-md btn-info"> Create Event</a></td>		 
                        </tr> 
                    </table>
                </form>
            </div>

        </div> 



    </body>
</html>
