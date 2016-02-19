<?php

namespace modules\product_list{

    class ProductsList{

    private $products;

    public function __construct() {

        $setting = new Setting();
        add_action("admin_init", array($setting, "init"));

        //setting plugin name.
        $setting->setName("Product list");
        $setting->setId("PRODUCT-LIST");
    }

    public function callback(){

//        echo "hello";

        return "";
    }

    public function handler(){

        echo "hello";
    }

    public function content(){

        $this->head();
        $this->table();

        submit_button();
    }

    private function head(){

       echo '<h2>Set site wide Sell</h2>';

        ?>

        <form>
            <input type="number" id="percentHolder" value="0" /><label> %</label>
        </form>

        <?php
    }

    private function table(){

        ?>

        <table>

        <tbody>
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
        <form>
            <tr>

                <?php

                $args = array('post_type' => array('product', 'product_variation', 'product_bundles'), 'posts_per_page' => -1);

                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ) : $loop->the_post();

                    global $product;

                    $meta_id = '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 1;

                    $rowUK = $product->get_price();
                    $rowUKSell = $product->get_sale_price();

                    $UKPrice = ($rowUK) !== "" ? $rowUK : "0";
                    $UKSellPrice = ($rowUKSell) !== "" ? $rowUKSell : "0";

                    $USPrice = (get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 1)[0]) !== "" ? get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 1)[0] : "0";
                    $USSELLPrice = (get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_' . 1)[0]) !== "" ? get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_' . 1)[0] : "0";

                    $EUROPrice = (get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 2)[0]) !== "" ? get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 2)[0] : "0";
                    $EUROSellPrice = (get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_' . 2)[0]) !== "" ? get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_' . 2)[0] : "0";

                    $AUDPrice = (get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 3)[0]) !== "" ? get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 3)[0] : "0";
                    $AUDSellPrice = (get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_' . 3)[0]) !== "" ? get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_' . 3)[0] : "0";

                    $CADPrice = isset(get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 4)[0]) !== "" ? get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_' . 4)[0] : "0";
                    $CADSellPrice = isset(get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_' . 4)[0]) !== "" ? get_post_meta($product->id, '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_' . 4)[0] : "0";
                ?>
                    <td><?php echo $product->get_title()?></td>
                    <td><center><?php echo $product->get_sku() ?></center></td>
                    <td class="prices"><center><input type="number" value="<?php echo $UKPrice ?>"></center></td>
                    <td class="sales prices"><center><input type="number" value="<?php echo $UKSellPrice ?>"></center></td>
                    <td class="prices"><center><input type="number" value="<?php echo $USPrice  ?>"></center></td>
                    <td class="sales prices"><center><input type="number" value="<?php echo $USSELLPrice ?>"></center></td>
                    <td class="prices"><center><input type="number" value="<?php echo  $EUROPrice ?>"></center></td>
                    <td class="sales prices"><center><input type="number" value="<?php echo $EUROSellPrice  ?>"></center></td>
                    <td class="prices"><center><input type="number" value="<?php echo  $AUDPrice ?>"></center></td>
                    <td class="sales prices"><center><input type="number" value="<?php echo $AUDSellPrice ?>"></center></td>
                    <td class="prices"><center><input type="number" value="<?php echo $CADPrice  ?>"></center></td>
                    <td class="sales prices"><center><input type="number" value="<?php echo $CADSellPrice  ?>"></center></td>

                </tr>


            <?php endwhile; ?>

            </tbody>
            </table>

        </form>

        <?php
    }
    }
}