<?php
error_reporting(0);
session_start();

require_once "inc/config.php";
require_once "inc/dbhelper.php";

class EventHelper
{
    function addUser()
    {
        $id         = $_POST['id'];
        $name       = $_POST['name'];
        $phone      = $_POST['phone'];
        $email      = $_POST['email'];
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        
        $db=new Database();
        $db->open();
        $sql = "";
        
        if($id)
        {
            $sql= "UPDATE `users` SET `name`='".$name."',`phone`='".$phone."',`email`='".$email."', `username`='".$username."', `password`='".$password."' WHERE `id`=".$id;   
        }
        else
        {
            $sql    = "SELECT * FROM `users` WHERE `username` = '".$username."'";
            $result = $db->query($sql);
            
            if($db->num_of_rows($result))
            {
                return false;
            }
        
            $sql= "INSERT INTO `users` (`id`, `name`, `phone`, `email`, `username`, `password`) 
                   VALUES (NULL, '".$name."', '".$phone."', '".$email."', '".$username."', '".$password."');";   
        }
    
        $result = $db->query($sql);
        
        return $result;       
    }
    
    
    function checkLogin()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $db=new Database();
        $db->open();
        $sql="SELECT * FROM `users` WHERE `username` ='".$username."' and `password`='".$password."' AND `status` = 1";
        $result=$db->query($sql);
        $row=$db->fetchobject($result);
        return $row;   
    }
    
    function addEvent()
    {
        $event_name     = $_POST['event_name'];
        
        $event_date     = $_POST['event_date'];
        $event_date     = explode('/', $event_date);
        $event_date     = $event_date[2].'-'.$event_date[1].'-'.$event_date[0];
        
        $event_location = $_POST['event_location'];
        $event_details  = $_POST['event_details'];
        
        $newfilename = "";
        $imagefile = $_POST['imagefile'];
        if($_FILES['image']['type']=='image/jpeg' || $_FILES['image']['type']=='image/gif' || $_FILES['image']['type']=='image/png')
        {
            if($_FILES['image']['error']>0)
            {
                echo "Error :".$_FILES['image']['error'];
            }        
            else
            {
                $imagepath="images/events/";
                
                if(!is_dir($imagepath))
                {
                    mkdir($imagepath,0777);
                }
                
                if(is_uploaded_file($_FILES['image']['tmp_name']))
                {
                    $filename  = $_FILES['image']['name'];
                    $extension = end(explode(".",$filename)); 
                    $newfilename = "event_".time().".".$extension;
                   
                    move_uploaded_file($_FILES['image']['tmp_name'],$imagepath.$newfilename); 
                }
            }
        }
        else
        {
            $newfilename = $imagefile;
        }
        
        
        $db=new Database();
        $db->open();
        
        $sql= "INSERT INTO `events` (`id`, `event_name`, `event_date`, `event_location`, `event_image`, `event_details`, `userid`) 
                   VALUES (NULL, '".$event_name."', '".$event_date."', '".$event_location."', '".$newfilename."', '".$event_details."','".$_SESSION['userid']."');";   
        
        $result = $db->query($sql);
        
        return $result;
    }
    
    function posted_events()
    {
        $db=new Database();
        $db->open();
        
        $sql = "SELECT * FROM `events` WHERE `userid` = '".$_SESSION['userid']."' ORDER BY `id` DESC";
        $result = $db->query($sql);
        ?>
        <table class="table table-bordered"> 
            <tr>
                <th width="5%">ID</th>
                <th width="7%">Image</th>
                <th width="15%">Event Name</th>
                <th width="9%">Event Date</th>
                <th width="15%">Event Location</th>
                <th>Event Details</th>
                <th class="text-center" width="8%">Status</th>
                <th class="text-center" width="9%">Registations</th>
            </tr>   
        <?php
        while($row = $db->fetcharray($result))
        {
            ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td>
                    <?php
                    if(file_exists('images/events/'.$row['event_image']) && $row['event_image'])
                    {
                        ?>
                        <img style="width: 60px;" src="<?php echo 'images/events/'.$row['event_image'];?>" alt=""/>
                        <?php
                    }
                    ?>
                </td>
                <td><?php echo $row['event_name'];?></td>
                <td><?php echo date('d/m/Y',strtotime($row['event_date']));?></td>
                <td><?php echo $row['event_location'];?></td>
                <td><?php echo $row['event_details'];?></td>
                <td class="text-center">
                    <?php echo ($row['status']) ? 'Active' : 'Inactive';?>
                </td>
                <td class="text-center">
                    <a class="btn btn-sm btn-info" href="event_registrations.php?event_id=<?php echo $row['id'];?>"><i class="fa fa-users"></i></a>
                </td>
            </tr>
            <?php
        }
        ?>
        </table>   
        <?php
    }
    
    function getEvent($id)
    {
        $db=new Database();
        $db->open();
        
        $sql = "SELECT * FROM `events` WHERE `id` = ".$id;
        $result = $db->query($sql);
        
        $row = $db->fetchobject($result);
        
        return $row;
    }
    
    function events()
    {
        $db=new Database();
        $db->open();
        
        $sql = "SELECT * FROM `events` WHERE `status` = 1 ORDER BY `event_date` DESC";
        $result = $db->query($sql);
        
        ?>
        <div class="row">
        <?php
        while($row = $db->fetcharray($result))
        {
            ?>
            <div class="col-md-4">
                <section class="blog-item">
                    <div class="blog-image">
                        <?php
                        if(file_exists('images/events/'.$row['event_image']) && $row['event_image'])
                        {
                            ?>
                            <img class="img-responsive img-fullwidth"  src="<?php echo 'images/events/'.$row['event_image'];?>" alt=""/>
                            <?php
                        }
                        ?>
                        <a href="event.php?id=<?php echo $row['id'];?>">
                            <span class="blog-overlay">
                                <span class="blog-info">
                                    <span class="zoom-icon"><i class="fa fa-plus fa-2x"></i></span>
                                </span>
                            </span>
                        </a>
                    </div>
                    <h5 class="margin-0">
                        <a href="event.php?id=<?php echo $row['id'];?>"><?php echo $row['event_name'];?></a>
                    </h5>
                    <span class="date">
                        <a href="event.php?id=<?php echo $row['id'];?>">
                            <?php echo date('d/m/Y', strtotime($row['event_date']));?>
                        </a>
                    </span>
                    <p><a href="event.php?id=<?php echo $row['id'];?>" class="strong">Read more <i class="fa fa-angle-double-right"></i></a></p>
                </section>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    }
    
    function addBooking()
    {
        $event_id   = $_POST['event_id'];
        $name       = $_POST['name'];
        $phone      = $_POST['phone'];
        $email      = $_POST['email'];
        
        $db=new Database();
        $db->open();
        $sql = "";
        
        
        $sql= "INSERT INTO `event_booking` (`id`, `event_id`, `name`, `phone`, `email`) 
               VALUES (NULL, '".$event_id."', '".$name."', '".$phone."', '".$email."');";
        $result = $db->query($sql);
    
        if($result)
        {
            return '<div class="alert alert-info" role="alert">
    				    <h3>Booking successful.</h3>
    			    </div>';
        }
        else
        {
            return '<div class="alert alert-info" role="alert">
    				    <h3>Booking not successful.</h3>
    			    </div>';
        }   
        
    }
    
    function event_bookings($event_id)
    {
        $db=new Database();
        $db->open();
        $sql = "";
        
        $sql = "SELECT * FROM `event_booking` WHERE `event_id` = '".$event_id."' ORDER BY `id` DESC";
        $result = $db->query($sql);
        ?>
        <table class="table table-bordered"> 
            <tr>
                <th width="8%">Sr. No.</th>
                <th>Name</th>
                <th width="12%">Phone</th>
                <th width="28%">Email</th>
            </tr>   
        <?php
        $sr = 1;
        while($row = $db->fetcharray($result))
        {
            ?>
            <tr>
                <td><?php echo $sr;?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['email'];?></td>
            </tr>
            <?php
            $sr++;
        }
        ?>
        </table>   
        <?php
    }
}
?>