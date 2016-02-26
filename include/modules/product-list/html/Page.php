<?php 

namespace modules\product_list\html;

/**
* 
*/
class Page{

	public function handler(){

		$this->tableHead();
		$this->head();

		$table = new \modules\product_list\table\Table();
		$table->render();

		$this->tableEnd();
	}

	public function tableHead(){

		echo "<table>";
	}

	public function tableEnd(){

		echo "</table>";
	}
	
	public function head(){

		?>

		<thead>
			
			<tr>
				<th><h2>Set site wide Sell</h2></th>
			</tr>
			<tr>
				<th>
					<label for="type">Price: </label>
					<select name="type" id="priceType">
            			<option>Sale price</option>
            			<option>Price</option>
            		</select>
				</th>
				<th>
					<label for="amount">Amount to reduce the price by</label>
					<input type="number" name="amount" id="amount" class="product_list-page-amount" value="0" />
				</th>
				<th>
					<label for="reduceType">By % or fixed amount</label>
					<select name="reduceType" id="reduceType">
            			<option>by %</option>
            			<option>by fixed amount</option>
            		</select>
				</th>
				<th>
					<input type="button" id="updatePrices" value="Update Prices" />
				</th>
				<!-- <th> -->
					<!-- <input type="button" id="resetPrices" value="Reset Prices" /> -->
				<!-- </th> -->
			</tr>

		</thead>
       ?>

        <?php
    }
}

 ?>