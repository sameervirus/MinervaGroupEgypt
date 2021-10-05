<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	public function setup() 
	{
$admin = new Role();
$admin->name         = 'admin';
$admin->display_name = 'User Administrator';
$admin->description  = 'User is allowed to manage and edit other users';
$admin->save();

$editor = new Role();
$editor->name         = 'editor';
$editor->display_name = 'User Editor';
$editor->description  = 'User is allowed to manage and edit content';
$editor->save();

$manager = new Role();
$manager->name         = 'user';
$manager->display_name = 'Website User';
$manager->description  = 'Website User';
$manager->save();
	}
}