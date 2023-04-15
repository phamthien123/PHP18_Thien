
<!-- LIST BOOKS -->
<div class="feat_prod_box_details">
	<?php
	$linkCategory	= URL::createLink('shop', 'index', 'index');
	$linkSubimtForm	= URL::createLink('shop', 'user', 'buy');

	if (!empty($this->Items)) {
		$xhtml = '';
		$totalPrice	= 0;
		foreach ($this->Items as $key => $value) {
			$name	= $value['name'];

			$bookID			= $value['id'];
			$catID			= $value['category_id'];
			$bookNameURL	= URL::filterURL($name);
			$catNameURL		= URL::filterURL($value['category_name']);

			// $linkDetailBook	= URL::createLink('default', 'book', 'detail', array('category_id' => $value['category_id'], 'book_id' => $value['id']), "$catNameURL/$bookNameURL-$catID-$bookID.html");

			$price			= number_format($value['price']);
			$priceTotal		= number_format($value['totalprice']);
			$quantity		= $value['quantity'];
			$totalPrice		+= $value['totalprice'];

			$picturePath	= UPLOAD_PATH . 'shop' . DS . '98x150-' . $value['picture'];
			if (file_exists($picturePath) == true) {
				$picture	= '<img  width="30" width="45" src="' . UPLOAD_URL . 'shop' . DS . '98x150-' . $value['picture'] . '">';
			} else {
				$picture	= '<img width="30" width="45" src="' . UPLOAD_URL . 'shop' . DS . '98x150-default.jpg' . '">';
			}

			$inputBookID	= Helper::cmsInput('hidden', 'form[bookid][]', 'input_book_' . $value['id'],  $value['id']);
			$inputQuantity	= Helper::cmsInput('hidden', 'form[quantity][]', 'input_quantity_' . $value['id'],  $value['quantity']);
			$inputPrice		= Helper::cmsInput('hidden', 'form[price][]', 'input_price_' . $value['id'],  $value['price']);
			$inputName		= Helper::cmsInput('hidden', 'form[name][]', 'input_name_' . $value['id'],  $value['name']);
			$inputPicture		= Helper::cmsInput('hidden', 'form[picture][]', 'input_picture_' . $value['id'],  $value['picture']);

			$xhtml	.= '
						<tr>
							<td>
								<div class="media">
									<div class="d-flex">
										<img ' . $picture . '
									</div>
									<div class="media-body">
										<p>' . $name . '</p>
									</div>
								</div>
							</td>
							<td>
								<h5>$' . $price . '</h5>
							</td>
							<td>
							' . $quantity . '
							</td>
							<td>
								<h5>$' . $priceTotal . '</h5>
							</td>
							<td>
								<h5><a href="#"><i class="ti-close"></i></a></h5>
							</td>
						</tr>';
			$xhtml	.= $inputBookID . $inputQuantity . $inputPrice . $inputName . $inputPicture;
		}
	?>
		<form action="<?php echo $linkSubimtForm; ?>" method="POST" name="adminForm" id="adminForm">
			<section class="cart_area">
				<div class="container">
					<div class="cart_inner">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Product</th>
										<th scope="col">Price</th>
										<th scope="col">Quantity</th>
										<th scope="col">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php echo $xhtml; ?>
									<tr>
										<td></td>
										<td></td>
										<td>
											<h5>Tổng Hóa Đơn</h5>
										</td>
										<td>
											<h5>$ <?php echo number_format($totalPrice) ?></h5>
										</td>
									</tr>
									<tr class="out_button_area">
										<td></td>
										<td></td>
										<td></td>
										<td>
											<div class="checkout_btn_inner">
												<a class="gray_btn" href="<?php echo $linkCategory; ?>">Continue Shopping</a>
												<a  onclick="javascript:submitForm('<?php echo $linkSubimtForm; ?>')" href="#" class="main_btn">Thanh Toán</a>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
		</form>
	<?php
	} else {
	?>
		<h3>Chưa có quyển sách nào trong giỏ hàng</h3>
	<?php
	}
	?>