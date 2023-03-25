<?php
$linkGroup 		= URL::createLink('admin', 'group', 'index');
$linkUser 		= URL::createLink('admin', 'user', 'index');
$linkStudent 	= URL::createLink('admin', 'student', 'index');
$linkRss 		= URL::createLink('admin', 'rss', 'index');

?>
<div id="submenu-box">
	<div class="m">
		<ul id="submenu">
			<li><a href="<?php echo $linkGroup ?>">Group</a></li>
			<li><a href="<?php echo $linkUser ?>">User</a></li>
			<li><a href="<?php echo $linkStudent ?>">Student</a></li>
			<li><a href="<?php echo $linkRss ?>">Rss</a></li>
			<li><a href="#" class="active">Coupon</a></li>
		</ul>
		<div class="clr"></div>
	</div>
</div>