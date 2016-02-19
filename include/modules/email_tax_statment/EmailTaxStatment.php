<?php

/**
* 
*/

namespace modules\email_tax_statmant{

	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	class EmailTaxStatment{

		function __construct(){

			$setting = new Setting();
			add_action("admin_init", array($setting, "init"));

			//setting plugin name.
			$setting->setName("Email Tax Statment");
			$setting->setId("EMAIL-TAX-STATMENT");

			//adding actions.
			add_action("woocommerce_email_after_order_table", array( $this, "email_tax_statment"));
			add_action("woocommerce_countries_tax_or_vat", array( $this, "remove_tax"));

			add_action("electrastim_settings", array($this, "setting"));

			//removing actions.
			remove_action("woocommerce_countries_ex_tax_or_vat", "woocommerce_countries_ex_tax_or_vat");
			remove_action("woocommerce_countries_tax_or_vat", "woocommerce_countries_tax_or_vat");
		}

		public function remove_tax(){

			$label = '';
			return $label;
		}

		public function email_tax_statment($value=''){

			?>
			<h2>Tax</h2>
			<p>Orders include Tax as follows.<p>

			<table style="width: 250px; border: 1px solid black;"><!-- heading -->

				<tbody>
				<tr>
					<td style="text-align: center; border: 1px solid black;"><strong>Country</strong></td>
					<td style="text-align: center; border: 1px solid black;"><strong>Tax Rate</strong></td>
				</tr>
				<!-- Uk Euprope -->
				<tr style="text-align: center; border: 1px solid black;">
					<td style="text-align: center; border: 1px solid black;">UK/Europe</td>
					<td style="text-align: center; border: 1px solid black;">20%</td>
				</tr>
				<tr style="text-align: center; border: 1px solid black;"><!-- USA --></tr>
				<tr>
					<td style="text-align: center; border: 1px solid black;">USA</td>
					<td style="text-align: center; border: 1px solid black;">0%</td>
				</tr>
				<!-- Canada -->
				<tr style="text-align: center; border: 1px solid black;">
					<td style="text-align: center; border: 1px solid black;">Canada</td>
					<td style="text-align: center; border: 1px solid black;">0%</td>
				</tr>
				<!-- Australia -->
				<tr style="text-align: center; border: 1px solid black;">
					<td style="text-align: center; border: 1px solid black;">Australia</td>
					<td style="text-align: center; border: 1px solid black;">0%</td>
				</tr>
				</tbody>
			</table>
			<?php
		}
	}
}
?>