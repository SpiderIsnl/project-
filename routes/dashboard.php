<?php
    session_start();
    if(!isset($_session['userdata'])){
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupdata = $_SESSION['groupdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red"> Not Voted</b>';
    }
    else{
        $status = '<b style="color:green"> Voted</b>';
    }
?>

<html>

    <head>
        <title>Online Voting System - Dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    <head>

    <body>

        <style>
            #backbtn{
                padding: 5px;
                font-size: 15px;
                background-color: #3498db;
                color: white;
                border-radius: 5px;
                float: left;
                margin: 10px;
            }
            #logoutbtn{
                padding: 5px;
                font-size: 15px;
                background-color: #3498db;
                color: white;
                border-radius: 5px;
                float: right;
                margin: 10px;
            }
            #Profile{
                background-color: white;
                width: 30%;
                padding: 20px;
                float: left;
            }
            #Group{
                background-color: white;
                width: 60%;
                padding: 20px;
                float: right;
            }
            #votebtn{
                padding: 5px;
                font-size: 15px;
                background-color: #3498db;
                color: white;
                border-radius: 5px;
            }
            #mainpanel{
                padding: 10px;
            }
            #voted{
                padding: 5px;
                font-size: 15px;
                background-color: green;
                color: white;
                border-radius: 5px;
            }

        </style>

        <div id="mainsection">
            <center>
            <div id="headersection">
                <a href="../"><button id="backbtn"> Back</button> </a>
                <a href="logout.php"><button id="logoutbtn"> logout</button></a>
                <hi>Online Voting System</h1>
            </div>
            </center>
            <hr>
        
            <div id="mainpanel">

            <div id="Profile">
                <center><img src="../uploads/<?php echo $userdata['photo']?>" height="100" width="100"></center><br><br>
                <b>Name:</b> <?php echo $userdata['name']?><br><br>
                <b>Mobile:</b>  <?php echo $userdata['Mobile']?><br><br>
                <b>Address:</b>  <?php echo $userdata['Address']?><br><br>
                <b>Status:</b>  <?php echo $status?><br><br>
            </div>

            <div id="Group">
                <?php
                    if($_SESSION['groupdata']){
                        for($i=0; $i<count($groupdata); $i++){
                            ?>
                            <div>
                                <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                                <b>Group Name:</b> <?php echo $groupsdata[$i]['name'] ?> <br><br>
                                <b>Votes:</b> <?php echo $groupsdata[$i]['Votes'] ?> <br><br>
                                <form action= "../api/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                                    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['gid']?>">
                                    <?php
                                        if($_SESSION['userdata']['status']==0){
                                            ?>
                                            <input type="submit" name="votebtn" value="vote" id="votebtn">
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <button disabled type="button" name="votebtn" value="vote" id="voted">voted</button>
                                            <?php
                                        }
                                    ?>
                                    
                                </form>
                            </div>
                            <hr>
                            <?php
                        }
                    }else{

                    }
                ?>
            </div>
            </div>


    <body>

<html>