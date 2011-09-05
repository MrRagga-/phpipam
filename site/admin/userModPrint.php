<?php

/**
 * Script to print add / edit / delete users
 *************************************************/

/* required functions */
require_once('../../functions/functions.php'); 

/* verify that user is admin */
checkAdmin();

/**
 * If action is not set get it form post variable!
 */
if (!$action) {

    $action = $_POST['action'];
    $id     = $_POST['id'];
    
    //fetch all requested userdetails
    $user = getUserDetailsById($id);
}
else {
	/**
	 * Set dummy data
	 */
	$user['real_name'] = '';
	$user['username']  = '';
	$user['email']     = '';
	$user['password']  = '';
}
?>


<div class="normalTable userMod">

<form id="userMod">

<table class="userMod normalTable">

<!-- real name -->
<tr>
    <td>Real name</td> 
    <td>
        <input type="text" name="real_name" value="<?php print $user['real_name']; ?>">
    </td>
    <td class="info">Enter users real name</td>
</tr>

<!-- username -->
<tr>
    <td>Username</td> 
    <td>
        <input type="text" name="username" value="<?php print $user['username']; ?>" <?php if($action == "Edit") print 'readonly'; ?>>
    </td>   
    <td class="info">Enter username</td>
</tr>

<!-- username -->
<tr>
    <td>e-mail</td> 
    <td>
        <input type="text" name="email" value="<?php print $user['email']; ?>">
    </td>
    <td class="info">Enter users email address (mail with details will be sent to user after creation!)</td>
</tr>

<!-- password -->
<tr>
    <td>Password</td> 
    <td>
        <input type="password" class="userPass" name="password1">
    </td>   
    <td class="info">Users password (<a href="#" id="randomPass">click to generate random!</a>)</td>
</tr>

<!-- password repeat -->
<tr>
    <td>Password (repeat)</td> 
    <td>
        <input type="password" class="userPass" name="password2">
    </td>   
    <td class="info">Re-type password</td>
</tr>

<!-- send notification mail -->
<tr>
    <td>Notification</td> 
    <td>
        <input type="checkbox" name="notifyUser" <?php if($action == "Add") { print 'checked'; } else if($action == "Delete") { print 'disabled="disabled"';} ?>>
    </td>   
    <td class="info">Send notification email to user with account details</td>
</tr>

<!-- role -->
<tr>
    <td>User role</td> 
    <td>
        <select name="role">
            <option name="admin"    <?php if ($user['role'] == "Administrator") print "selected"; ?>>Administrator</option>
            <option name="operator" <?php if ($user['role'] == "Operator")      print "selected"; ?>>Operator</option>      
            <option name="viewer" 	<?php if ($user['role'] == "Viewer")      	print "selected"; ?>>Viewer</option> 
        </select>
    </td> 
    <td class="info">Select user role
    <ul>
    	<li>Administrator is almighty</li>
    	<li>Operator can view/edit IP addresses (cannot add section, subnets, modify server settings etc)</li>
    	<li>Viewer can only view IP addresses</li>
    </td>  
</tr>

<!-- Submit and hidden values -->
<tr class="th">
    <td></td> 
    <td class="submit">
        <input type="hidden" name="id"     value="<?php print $user['id']; ?>">
        <input type="hidden" name="action" value="<?php print $action;     ?>">
        
        <input type="submit" value="<?php print $action; ?> User">
    </td>   
    <td></td>
</tr>

<!-- Edit / add result -->
<tr class="th">
    <td colspan="3">
        <div class="userModResult"></div>
    </td>
    <td></td>
</tr>

</table>
</form>
</div>


<!-- Result -->