<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<div id="dashboard">
	<div style="float:left"><?php echo $this->Html->link(__("Dashboard",true),"/admin/dashboard") ?></div>
<?php   if ($this->UserAuth->isAdmin()) { ?>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Add User",true),"/admin/addUser") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("All Users",true),"/admin/allUsers") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Add Group",true),"/admin/addGroup") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("All Groups",true),"/admin/allGroups") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Permissions",true),"/admin/permissions") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Profile",true),"/admin/viewUser/".$this->UserAuth->getUserId()) ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Edit Profile",true),"/admin/editUser/".$this->UserAuth->getUserId()) ?></div>
<?php   } else {?>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Profile",true),"/admin/myprofile") ?></div>
<?php   } ?>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Change Password",true),"/admin/changePassword") ?></div>
	<div style="float:right;padding-left:10px"><?php echo $this->Html->link(__("Sign Out",true),"/admin/logout") ?></div>
	<div style="clear:both"></div>
</div>