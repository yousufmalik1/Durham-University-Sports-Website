
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/manager.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <!--Xuantong files --> 
    <script type="text/javascript" src="../js/manager.js"></script>
    <!--<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script> --> 
    <script type="text/javascript" src="../js/jquery.ssd-vertical-navigation.min.js"></script>
    <!--<script type="text/javascript" src="../js/jquery.js"></script> -->
    <script type="text/javascript" src="../js/main.js"></script>
    
    <script>
     $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
       
    //Onload, it calls load.php to make a call to a database to get the info we need. 
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    editable:true,

   });
     });
   
  </script>
    
    
    

</head>
<body>
<header>
    <div class="logo">
        <a href="https://www.teamdurham.com/"><img src="../images/teamdurham.png" height="77" width="78" /></a>
    </div><!-- end logo -->
    <div id="menu_icon"></div>
    <nav>
        <ul>
            <li><a href="#.php">Personal Profile</a></li>
            <li><a href="#.php">Booking List</a></li>
        </ul>
    </nav><!-- end navigation menu -->
</header><!-- end header -->
<section class="main clearfix">
    <div id="loginsection">
        <p class="logincs"><a href="../html/login.html">Login</a> || <a href="../html/registry.html">Registry</a></p>
    </div>
    <section class="top">
        <div class="wrapper content_header clearfix">
            <div class="duslogan">
                <p>DURHAM UNIVERSITY SPORT</p>
            </div>
            <div class="logoDU">
                <a href="https://www.teamdurham.com"><img src="../images/dulogowhite.png"  /></a>
            </div>
            <p class="title">
                <a href="#">Facilities</a> |||| <a href="#">Calendar</a> |||| <a href="#">How to use</a></p>
        </div>
    </section><!-- end top -->
    
    <br>
  <h2 align="center"> User Calendar </h2>
  <br />
  <div class="container">
   <div id="calendar"></div>
  </div>
    
    </section><!-- end main -->
<script type="text/javascript">
    $(function() {
        $('#leftNavigation').ssdVerticalNavigation();
    });
</script>
</body>
</html>