<?php
include('../../../config/config.php');

if ($_GET['yearOption'] != '') {
    $monthOption = $_GET['monthOption'];
    $yearOption = $_GET['yearOption'];
    $dayOption = '31';
} elseif ($_GET['yearOption'] === '') {
    $monthOption = date('m');
    $yearOption = date('Y');
    $dayOption = date('d', strtotime($currentDate));
}

if ($monthOption == '01') {
    $month = 'Januari';
} elseif ($monthOption == '02') {
    $month = 'Februari';
} elseif ($monthOption == '03') {
    $month = 'Maret';
} elseif ($monthOption == '04') {
    $month = 'April';
} elseif ($monthOption == '05') {
    $month = 'Mei';
} elseif ($monthOption == '06') {
    $month = 'Juni';
} elseif ($monthOption == '07') {
    $month = 'Juli';
} elseif ($monthOption == '08') {
    $month = 'Agustus';
} elseif ($monthOption == '09') {
    $month = 'September';
} elseif ($monthOption == '10') {
    $month = 'Oktober';
} elseif ($monthOption == '11') {
    $month = 'November';
} elseif ($monthOption == '12') {
    $month = 'Desember';
}
$sellingPayment = "SELECT SUM(product_qty) as jml_terbeli, product_code_relation as product_code, product_name as product_name, 
    substring(ts_insert from 1 for 7) as periode 
        FROM tb_buying_transaction_detail 
        WHERE 
        ts_insert BETWEEN '" . $yearOption . "-" . $monthOption . "-01 00:00:00' AND '" . $yearOption . "-" . $monthOption . "-" . $dayOption . " 23:59:59'  
        AND bl_state <> 'D' 
        GROUP BY product_code, product_name, periode 
        ORDER BY jml_terbeli DESC 
        LIMIT 10
	";
$queryTotalSellingIncome = mysqli_query($config, $sellingPayment);
?>
<script>
    var ctx = document.getElementById("buyingBestProduct_barChart_").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php
                        $bulans = '';
                        while ($row0 = mysqli_fetch_array($queryTotalSellingIncome)) {
                            $productName = $row0['product_name'];

                            if (!$bulans) {
                                $bulans = '"' . $productName . '"';
                            } else {
                                $bulans = $bulans . ' , ' . '"' . $productName . '"';
                            }
                        };
                        echo ($bulans);
                        mysqli_data_seek($queryTotalSellingIncome, 0);
                        ?>],
            datasets: [{
                label: '<?php echo $month . " " . $yearOption; ?>',
                data: [<?php
                        $totalPurchase = '';
                        while ($row1 = mysqli_fetch_array($queryTotalSellingIncome)) {
                            if (!$totalPurchase) {
                                $totalPurchase = "'" . $row1['jml_terbeli'] . "'";
                            } else {
                                $totalPurchase = $totalPurchase . ' , ' . "'" . $row1['jml_terbeli'] . "'";
                            }
                        };
                        echo ($totalPurchase);
                        mysqli_data_seek($queryTotalSellingIncome, 0);
                        ?>],
                backgroundColor: [<?php
                                    $count1 = 0;
                                    while ($row2 = mysqli_fetch_array($queryTotalSellingIncome)) {
                                        if ($count1 > 0) echo ',';
                                    ?> 'rgb(245, 64, 64)',
                        'rgb(44, 161, 230)'
                    <?php
                                        $count1++;
                                    };
                                    mysqli_data_seek($queryTotalSellingIncome, 0);
                    ?>
                ],
                borderColor: [<?php
                                $count2 = 0;
                                while ($row = mysqli_fetch_array($queryTotalSellingIncome)) {
                                    if ($count2 > 0) echo ',';
                                ?> 'rgb(207, 54, 54)',
                        'rgb(34, 127, 181)'
                    <?php
                                    $count2++;
                                };
                                mysqli_data_seek($queryTotalSellingIncome, 0);
                    ?>
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<canvas id="buyingBestProduct_barChart_"></canvas>