<div class="wrap">

	<h1>CRM page</h1>

  <?php

	  global $wpdb;

	  $crmList = $wpdb->get_results( "SELECT * FROM `brew_order`", ARRAY_A );

  ?>

  <table class="wp-list-table widefat fixed striped table-view-list posts">
    <thead>
    <tr>
      <th>Order №</th>
      <th>Order data</th>
      <th>Client name</th>
      <th>Client phone</th>
      <th>Client email</th>
      <th>Order</th>
      <th>Order amount</th>
      <th>Delivery type</th>
      <th>Delivery address</th>
      <th>Pay method</th>
      <th>Order message</th>
      <th>Order status</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach( $crmList as $order ):?>
    <tr>
        <td><?php echo $order['order_number'];?></td>
        <td><?php echo $order['create_data'];?></td>
        <td><?php echo $order['name'];?></td>
        <td><?php echo $order['phone'];?></td>
        <td><?php echo $order['email'];?></td>
        <td>
          <?php
            $productList = json_decode($order['order_list'], true);

            foreach ( $productList as $product ):
          ?>
              <p>
                Назва: <?php echo $product['productName'];?> </br>
                Кількість: <?php echo $product['productCount'];?> </br>
                Ціна за 1: <?php echo $product['productPrice'];?> </br>
                Ціна загалом: <?php echo $product['productPrice'] * $product['productCount'];?>
              </p>
          <?php endforeach;?>
        </td>
        <td><?php echo $order['order_sum'];?></td>
        <td>
          <?php if( $order['delivery_type'] == 'np' ):?>
            Нова пошта
          <?php endif;?>
	        <?php if( $order['delivery_type'] == 'sp' ):?>
            Самовивіз
	        <?php endif;?>
        </td>
        <td><?php echo $order['delivery_address'];?></td>
        <td><?php echo $order['pay_type'];?></td>
        <td><?php echo $order['order_comment'];?></td>
        <td><?php echo $order['order_status'];?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>