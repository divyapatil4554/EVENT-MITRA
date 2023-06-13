<?php
error_reporting(0);
session_start();

require_once "../inc/config.php";
require_once "../inc/dbhelper.php";

class AdminHelper
{
    function checkLogin()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $db=new Database();
        $db->open();
        $sql="SELECT * FROM `admins` WHERE `username` ='".$username."' and `password`='".$password."' AND status = 1";
        $result=$db->query($sql);
        $row=$db->fetchobject($result);
        return $row;   
    }
    
    function getUsers()
    {
        $db=new Database();
        $db->open();
        
        $sql = "SELECT * FROM `users` ORDER BY `id` DESC";
        $result = $db->query($sql);
        ?>
        <table class="table table-bordered"> 
            <tr>
			    <th>Name</th>                                                             
                <th>Email</th>                                                             
                <th>Phone</th>
                <th>Username</th>	
                <th>Status</th>		
                <th>Actions</th>	
            </tr>  
            <?php
            while($row = $db->fetcharray($result))
            {
                ?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td class="text-center">
                        <?php
                        if($row['status'])
                        {
                            ?>
                            <a class="text-success" href="users.php?id=<?php echo $row['id'];?>&status=0&task=update_status">
                                <i class="fa fa-check"></i>
                            </a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a class="text-danger" href="users.php?id=<?php echo $row['id'];?>&status=1&task=update_status">
                                <i class="fa fa-circle"></i>
                            </a>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="users.php?id=<?php echo $row['id']; ?>&task=remove">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>   
        <?php
    }
    
    function updateUserStatus()
    {
        $db=new Database();
        $db->open();
        
        $id     = $_REQUEST['id'];
        $status = $_REQUEST['status'];
                
        $sql = "UPDATE `users` SET `status` = ".$status." WHERE `id` = ".$id;
        $result = $db->query($sql);
        
        if($result)
        {
            return '<div class="alert alert-info" role="alert">
    				    <h3>User Status Changed Successfully.</h3>
    			    </div>';
        }
        else
        {
            return '<div class="alert alert-info" role="alert">
    				    <h3>User Status Not Changed Successfully.</h3>
    			    </div>';
        } 
    }
    
    function deleteUser()
    {
        $db=new Database();
        $db->open();
        
        $id     = $_REQUEST['id'];
                
        $sql = "DELETE FROM `users` WHERE `id` = ".$id;
        $result = $db->query($sql);
        
        if($result)
        {
            return '<div class="alert alert-info" role="alert">
    				    <h3>User Removed Successfully.</h3>
    			    </div>';
        }
        else
        {
            return '<div class="alert alert-info" role="alert">
    				    <h3>User Not Removed Successfully.</h3>
    			    </div>';
        } 
    }
    
    function getEvents()
    {
        $db=new Database();
        $db->open();
        
        $sql = "SELECT a.*, b.name, b.phone FROM `events` as a 
                LEFT JOIN `users` as b ON a.userid = b.id 
                ORDER BY a.`id` DESC";
        $result = $db->query($sql);
        ?>
        <table class="table table-bordered"> 
            <tr>
			    <th>Event Name</th>                                                             
                <th>Event Date</th>
                <th>Event Location</th>		
                <th>Event Details</th>	
                <th>Added By</th>			
                <th>Phone</th>
                <th>Status</th>
                <th>Actions</th>	
            </tr>  
            <?php
            while($row = $db->fetcharray($result))
            {
                ?>
                <tr>
                    <td><?php echo $row['event_name'];?></td>
                    <td><?php echo date('d/m/Y',strtotime($row['event_date']));?></td>
                    <td><?php echo $row['event_location'];?></td>
                    <td><?php echo $row['event_details'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td class="text-center">
                        <?php
                        if($row['status'])
                        {
                            ?>
                            <a class="text-success" href="events.php?id=<?php echo $row['id'];?>&status=0&task=update_status">
                                <i class="fa fa-check"></i>
                            </a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a class="text-danger" href="events.php?id=<?php echo $row['id'];?>&status=1&task=update_status">
                                <i class="fa fa-circle"></i>
                            </a>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="events.php?id=<?php echo $row['id']; ?>&task=remove"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>   
        <?php
    }
    
    function updateEventStatus()
    {
        $db=new Database();
        $db->open();
        
        $id     = $_REQUEST['id'];
        $status = $_REQUEST['status'];
                
        $sql = "UPDATE `events` SET `status` = ".$status." WHERE `id` = ".$id;
        $result = $db->query($sql);
        
        if($result)
        {
            return '<div class="alert alert-info" role="alert">
    				    <h3>Event Status Changed Successfully.</h3>
    			    </div>';
        }
        else
        {
            return '<div class="alert alert-info" role="alert">
    				    <h3>Event Status Not Changed Successfully.</h3>
    			    </div>';
        } 
    }
    
    function deleteEvent()
    {
        $db=new Database();
        $db->open();
        
        $id     = $_REQUEST['id'];
                
        $sql = "DELETE FROM `events` WHERE `id` = ".$id;
        $result = $db->query($sql);
        
        if($result)
        {
            return '<div class="alert alert-info" role="alert">
    				    <h3>Event Removed Successfully.</h3>
    			    </div>';
        }
        else
        {
            return '<div class="alert alert-info" role="alert">
    				    <h3>Event Not Removed Successfully.</h3>
    			    </div>';
        } 
    }
    
}