<?php
$imageURL	= $this->_dirImg;
$arrNews	= array(
	array('link' => URL::createLink('admin', 'news', 'index'), 'name' => 'News manager', 'image' => 'icon-48-article'),
	array('link' => URL::createLink('admin', 'categoryNews', 'index'), 'name' => 'categoryNews manager', 'image' => 'icon-48-category'),
	array('link' => URL::createLink('admin', 'rss', 'index'), 'name' => 'Rss manager', 'image' => 'icon-48-group'),
);
$arrMenu1	= array(
	array('link' => URL::createLink('admin', 'group', 'index'), 'name' => 'Group manager', 'image' => 'icon-48-group'),
	array('link' => URL::createLink('admin', 'user', 'index'), 'name' => 'User manager', 'image' => 'icon-48-user'),
);
$arrMenuShop	= array(
	array('link' => URL::createLink('admin', 'book', 'add'), 'name' => 'Add new book', 'image' => 'icon-48-article-add'),
	array('link' => URL::createLink('admin', 'book', 'index'), 'name' => 'Book manager', 'image' => 'icon-48-article'),
	array('link' => URL::createLink('admin', 'category', 'index'), 'name' => 'Category manager', 'image' => 'icon-48-category'),
	array('link' => URL::createLink('admin', 'coupon', 'index'), 'name' => 'Coupon manager', 'image' => 'icon-48-article'),
	array('link' => URL::createLink('admin', 'cart', 'index'), 'name' => 'Cart manager', 'image' => 'icon-48-user'),
);
foreach ($arrNews as $key => $value) {
	$image	= $imageURL . '/header/' . $value['image'] . '.png';
	$xhtml .= '<div class="icon-wrapper">
								<div class="icon">
									<a href="' . $value['link'] . '">
										<img src="' . $image . '" alt="' . $value['name'] . '">
										<span>' . $value['name'] . '</span>
									</a>
								</div>
							</div>';
}
foreach ($arrMenu1 as $key => $value) {
	$image	= $imageURL . '/header/' . $value['image'] . '.png';
	$xhtml1 .= '<div class="icon-wrapper">
								<div class="icon">
									<a href="' . $value['link'] . '">
										<img src="' . $image . '" alt="' . $value['name'] . '">
										<span>' . $value['name'] . '</span>
									</a>
								</div>
							</div>';
}
foreach ($arrMenuShop as $key => $value) {
	$image	= $imageURL . '/header/' . $value['image'] . '.png';
	$xhtmlShop .= '<div class="icon-wrapper">
								<div class="icon">
									<a href="' . $value['link'] . '">
										<img src="' . $image . '" alt="' . $value['name'] . '">
										<span>' . $value['name'] . '</span>
									</a>
								</div>
							</div>';
}
?>
<div id="element-box">
	<div class="m">
		<h3>System</h3>
		<div class="adminform">
			<div class="cpanel-left">
				<div class="cpanel">
					<?php echo $xhtml1; ?>
				</div>
			</div>
		</div>
		<div class="clr"></div>
	</div>
</div>
<div id="element-box">
	<div class="m">
		<h3>Shop</h3>
		<div class="adminform">
			<div class="cpanel-left">
				<div class="cpanel">
					<?php echo $xhtmlShop; ?>
				</div>
			</div>
		</div>
		<div class="clr"></div>
	</div>
</div>
<div id="element-box">
	<div class="m">
		<h3>News</h3>
		<div class="adminform">
			<div class="cpanel-left">
				<div class="cpanel">
					<?php echo $xhtml; ?>
				</div>
			</div>
		</div>
		<div class="clr"></div>
	</div>
</div>