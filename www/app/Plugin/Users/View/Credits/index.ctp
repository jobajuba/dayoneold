<!--Wrapper HomeServices Block Start Here-->
<?php echo $this->element("breadcrame",array('breadcrumbs'=>
	array('Credits'=>'Credits'))
	);
?>

<!--Wrapper main-content Block Start Here-->
<div id="main-content">
    <div class="container">
        <div class="row-fluid">
            <div class="span12"></div>
        </div>
        <div class="row-fluid">
            <?php echo $this->Element("myaccountleft") ?>
            <div class="span9">
                <h2 class="page-title">
                    <?php echo __("Credits"); ?>

                    <?php if($balance > 0): ?>
                        (<?php echo h(number_format($balance, 2)) ?> available)
                    <?php endif; ?>
                    <?php if(count($transactions) > 0): ?>
                    <p class="pull-right">
                        <?php
                        echo $this->Html->link(
                            __('+  Add Credits'),
                            '/transactions/create'
                            ,
                            array(
                                'title' => __('+  Add Credits'),
                                'class' => 'btn btn-primary btn-primary3',
                            )
                        );
                        ?>
                    </p>
                    <?php endif; ?>
                </h2>

                <?php if(count($transactions) == 0): ?>
                <div class="StaticPageRight-Block">
                    <div class="PageLeft-Block">
                        <div class="span12">
                            <p class="FontStyle20 color1">
                                <?php echo __("Purchase Credits")?>
                            </p>
                        </div>
                        <p>Looks like you don't have any pre-purchased Botangle credits.  We'll need you to add some before you can schedule a lesson.</p>
                        <?php echo $this->element('transactions/buy', array(
                                'refill_needed' => $refill_needed,
                                'token' => $token,
                            )); ?>
                    </div>
                </div>
                <?php else: ?>
                <div class="StaticPageRight-Block">
                    <div class="PageLeft-Block">
                        <div class="span12">
                            <p class="FontStyle20 color1">
                                <?php echo __("Transactions")?>
                            </p>
                        </div>
                        <?php if(count($transactions) > 0) : ?>
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Transaction</th>
                                    <?php /* can't believe I'm doing this in the name of expediency, please take it out */ ?>
                                    <th style="width: 50px; padding-right: 2em;">Amount</th>
                                    <th>Reference #</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($transactions as $transaction) {
                                $transaction = $transaction['Transaction']; ?>
                                <tr>
                                    <td><?php echo date("M d, Y", strtotime($transaction['created'])) ?></td>
                                    <td>
                                        <?php
                                        switch($transaction['type']) {
                                            case "buy":
                                                echo "Bought";
                                                break;
                                            case "sell":
                                                echo "Sold";
                                                break;
                                            case "transfer":
                                                echo "Transferred";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <?php /* can't believe I'm doing this in the name of expediency, please take it out */ ?>
                                    <td style="text-align: right !important; width: 50px; padding-right: 2em;"><?php echo number_format($transaction['amount'], 2); ?></td>
                                    <td><?php echo h($transaction['transaction_key']); ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if($enableCreditSales): ?>
                <div class="StaticPageRight-Block">
                    <div class="PageLeft-Block">
                        <div class="span12">
                            <p class="FontStyle20 color1">
                                <?php echo __("Sell Credits")?>
                            </p>
                        </div>
                        <?php echo $this->element('transactions/sell', array(
                                'email' => $email,
                            )); ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div><!-- @end .row -->
    </div><!-- @end .container -->
</div><!--Wrapper main-content Block End Here-->