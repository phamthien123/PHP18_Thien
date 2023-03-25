<?php
include_once(MODULE_PATH . 'admin/views/toolbar.php');
include_once 'submenu/index.php';

// COLUMN
$columnPost		= $this->arrParam['filter_column'];
$orderPost		= $this->arrParam['filter_column_dir'];
$lblUsername	= Helper::cmsLinkSort('Username', 'username', $columnPost, $orderPost);
$lblPrices		= Helper::cmsLinkSort('Prices', 'prices', $columnPost, $orderPost);
$lblQuantities	= Helper::cmsLinkSort('Quantities', 'quantities', $columnPost, $orderPost);
$lblID			= Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);


// Pagination
// $paginationHTML		= $this->pagination->showPagination(URL::createLink('admin', 'cart', 'index'));

// MESSAGE
$message	= Session::get('message');
Session::delete('message');
$strMessage = Helper::cmsMessage($message);

?>
<div id="system-message-container"><?php echo $strMessage; ?></div>

<div id="element-box">
	<div class="m">
		<form action="#" method="post" name="adminForm" id="adminForm">
			<!-- FILTER -->
			<fieldset id="filter-bar">
				<div class="filter-search fltlft">
					<label class="filter-search-lbl" for="filter_search">Filter:</label>
					<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->arrParam['filter_search']; ?>">
					<button type="submit" name="submit-keyword">Search</button>
					<button type="button" name="clear-keyword">Clear</button>
				</div>
			</fieldset>
			<div class="clr"> </div>

			<table class="adminlist" id="modules-mgr">
				<!-- HEADER TABLE -->
				<thead>
					<tr>
						<th width="1%"><input type="checkbox" name="checkall-toggle"></th>
						<th width="1%" class="nowrap"><?php echo $lblID; ?></th>
						<th class="title"><?php echo $lblUsername; ?></th>
						<th width="10%"><?php echo $lblPrices; ?></th>
						<th width="10%"><?php echo $lblQuantities; ?></th>
						<th width="10%">Total</th>
					</tr>
				</thead>
				<!-- BODY TABLE -->
				<tbody>
					<?php
					if (!empty($this->Items)) {
						$i = 0;
						foreach ($this->Items as $key => $value) {
							$id 		= $value['id'];
							$ckb		= '<input type="checkbox" name="cid[]" value="' . $id . '">';
							$username	= $value['username'];
							$prices		= $value['prices'];
							$quantities	= $value['quantities'];
							$row		= ($i % 2 == 0) ? 'row0' : 'row1';

							echo  '<tr class="' . $row . '">
		                                	<td class="center">' . $ckb . '</td>
											<td class="center">' . $id . '</td>
		                                	<td class="center">' . $username . '</a></td>
			                                <td class="center">' . $prices . '</td>
											<td class="center">' . $quantities . '</td>
											<td class="center">Total</td>
			                            </tr>';
							$i++;
						}
					}
					?>
				</tbody>
			</table>

			<div>
				<input type="hidden" name="filter_column" value="name">
				<input type="hidden" name="filter_page" value="1">
				<input type="hidden" name="filter_column_dir" value="asc">
			</div>
		</form>

		<div class="clr"></div>
	</div>
</div>
</div>