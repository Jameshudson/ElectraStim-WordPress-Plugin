<?php  

namespace modules\product_list\table;

/**
* 
*/
class Table{


	public function render(){

		$this->head();

		$this->tableHeader();

		$this->tableBody();

		$this->close();

    }

    public function tableHeader(){

    	?>
    		<thead>
    			<tr>
    				<th>Name</th>
		            <th>Item code</th>
		            <th>Price GBP</th>
		            <th>Sell Price GBP</th>
		            <th>Price USD</th>
		            <th>Sell Price USD</th>
		            <th>Price EURO</th>
		            <th>Sell Price EURO</th>
		            <th>Price AUD</th>
		            <th>Sell Price AUD</th>
		            <th>Price CAD</th>
		            <th>Sell Price CAD</th>
    			</tr>
    		</thead>
    	<?php
    }

    public function tableBody(){

    	// $products = new \modules\product_list\util\Products();

    	// $products = $products->getAllProducts();
        
        $products = array('title' => "testing", 
                          "sku" => "1234",
                          "uk" => "50",
                          "uk_sales" => "25",
                          "us" => "50",
                          "us_sales" => "25",
                          "euro" => "50",
                          "euro_sales" => "25",
                          "aud" => "50",
                          "aud_sales" => "25",
                          "cad" => "50",
                          "cad_sales" => "25",); 
    	?>
			<tbody>		
				<tr>
					<td><?php echo $products["title"] ?></td>
                    <td><center><?php echo $products["sku"] ?></center></td>

                    <td class="prices"><center><input class="product_list-page-amount" type="number" value="<?php echo $products["uk"] ?>"></center></td>
                    <td class="sales prices"><center><input class="product_list-page-salePriceTable" type="number" value="<?php echo $products["uk_sales"] ?>"></center></td>

                    <td class="prices"><center><input class="product_list-page-amount" type="number" value="<?php echo $products["us"]  ?>"></center></td>
                    <td class="sales prices"><center><input class="product_list-page-salePriceTable" type="number" value="<?php echo $products["us_sales"] ?>"></center></td>

                    <td class="prices"><center><input class="product_list-page-amount" type="number" value="<?php echo  $products["euro"] ?>"></center></td>
                    <td class="sales prices"><center><input class="product_list-page-salePriceTable" type="number" value="<?php echo $products["euro_sales"]  ?>"></center></td>

                    <td class="prices"><center><input class="product_list-page-amount" type="number" value="<?php echo  $products["aud"] ?>"></center></td>
                    <td class="sales prices"><center><input class="product_list-page-salePriceTable" type="number" value="<?php echo $products["aud_sales"] ?>"></center></td>

                    <td class="prices"><center><input class="product_list-page-amount" type="number" value="<?php echo $products["cad"]  ?>"></center></td>
                    <td class="sales prices"><center><input class="product_list-page-salePriceTable" type="number" value="<?php echo $products["cad_sales"]  ?>"></center></t>
				</tr>
			</tbody>
    	<?php
    }

    public function head(){

    	echo '<table id="product_list-page-priceTable">';
    }

    public function close(){

    	echo "</table>";
    }
}