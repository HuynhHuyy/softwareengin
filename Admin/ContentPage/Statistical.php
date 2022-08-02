<div class="container">
    <h1 class="text-center">Thống kê doanh thu cửa hàng</h1>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Năm</th>
                    <th>Tháng</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $totalyear = 0;
                    $i=0;
                    while($row = mysqli_fetch_array($sql_query_thongke)) {
                    $monthNum  = $row["month"];
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('n');
                    //
                    $month[] = $row["month"];
                    $total[] = $row["count"];
                    $totalyear += $row["count"];
                ?>
                <tr class="text-center">
                    <td><?php echo $row["year"]; ?></td>
                    <td><?php echo $monthName; ?></td>
                    <td><?php echo number_format($row["count"], 0, '',',')?> VND</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php $sumyear = number_format($totalyear, 0, '',',');
        echo "<h2>Tổng doanh thu 12 tháng: $sumyear vnđ </h2>"; 
        ?>
    </div>
    <div style="text-align:center">
        <h2 class="page-header" >Biểu đồ doanh thu</h2>
        <canvas  id="chartjs_bar"></canvas> 
    </div> 
</div>
<script type="text/javascript">
    var ctx = document.getElementById("chartjs_bar").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:<?php echo json_encode($month); ?>,
                    datasets: [{
                        backgroundColor: [
                            //quy1
                            "#5969ff",
                            "#5969ff",
                            "#5969ff",
                            //quy2
                            "#ff407b",
                            "#ff407b",
                            "#ff407b",
                            //quy3
                            "#25d5f2",
                            "#25d5f2",
                            "#25d5f2",
                            //quy4
                            "#ffc750",
                            "#ffc750",
                            "#ffc750",
                            //next year
                            "#2ec551"
                        ],
                        data:<?php echo json_encode($total); ?>,
                    }]
                },
                options: {
                        legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontFamily: 'Circular Std Book',
                        fontSize: 14,
                    }
                },
            }
            });
</script>