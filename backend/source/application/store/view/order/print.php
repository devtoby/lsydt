<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget__order-detail widget-body am-margin-bottom-lg">
                    <div >
                        <div class="am-u-sm-12" id="body">
                            <div>收货人:  <?= $detail['address']['name'] ?></div>
                            <div>订单号： <?= $detail['order_no'] ?></div>
                            <div>下单时间： <?= $detail['create_time'] ?></div>
                            <div>-----------------------------------------</div>
                            <table class="am-table am-table-bordered">
                                <tbody>
                                <tr>
                                    <th>商品名称</th>
                                    <th>商品编码</th>
                                    <th>重量(Kg)</th>
                                    <th>单价</th>
                                    <th>购买数量</th>
                                    <th>商品总价</th>
                                </tr>
                                <?php foreach ($detail['goods'] as $goods): ?>
                                    <tr>
                                        <td >
                                            <p class="goods-title"><?= $goods['goods_name'] ?></p>
                                        </td>
                                        <td><?= $goods['goods_no'] ?: '--' ?></td>
                                        <td><?= $goods['goods_weight'] ?: '--' ?></td>
                                        <td>￥<?= $goods['goods_price'] ?></td>
                                        <td>×<?= $goods['total_num'] ?></td>
                                        <td>￥<?= $goods['total_price'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div>-----------------------------------------</div>
                            <div>总计金额：￥<?= $detail['total_price'] ?></div>
                            <div>实付款金额: ￥<?= $detail['pay_price'] ?></div>
                        </div>

                        <div>
                            <button type="button" class="j-submit am-btn am-btn-secondary" onclick="doPrint()">打印</button>
                        </div>
                    </div>
                </div>

        </div>

    </div>

</div>
    <script type="text/javascript">
        function doPrint(){
            let bdhtml = document.getElementById('body').innerHTML;
            sprnstr="<!--startprint-->";
            eprnstr="<!--b-->";
            prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);
            // prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));

            window.document.body.innerHTML=prnhtml;
            window.print();
            top.layer.closeAll();
        }
    </script>
