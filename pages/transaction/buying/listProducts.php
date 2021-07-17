<?php
// header("Content-Type: application/json; charset=UTF-8");

include('../../../config/config.php');

$output['data'][] = [
    'id' : 'ietsanders'
    'kode' : 'test1', 
    'nama' : 'test2', 
    'alamat' : 'test3', 
    'telp' : 'test4', 
];
echo json_encode($output);
exit;


$c_name_L = mysqli_escape_string($config, strtolower($_GET['c_selling_product_name']));
$c_name_U = mysqli_escape_string($config, strtoupper($_GET['c_selling_product_name']));
$c_name_C = mysqli_escape_string($config, ucwords($c_name_L));

$querySelectProduct = mysqli_query($config, "
            SELECT tb_master_unit.*, tb_master_product.*, tb_master_stock.*, tb_master_stock.stockable as stock
                    FROM tb_master_stock 
                    LEFT JOIN tb_master_product ON tb_master_product.product_code = tb_master_stock.product_code_relation
                    INNER JOIN tb_master_unit ON tb_master_unit.unit_code = tb_master_product.unit_code_relation
                    WHERE (tb_master_product.product_name LIKE '%$c_name_L%' OR tb_master_product.product_name LIKE '%$c_name_C%' OR tb_master_product.product_code LIKE '%$c_name_L%' OR tb_master_product.product_code LIKE '%$c_name_C%')
                    AND tb_master_product.bl_state = 'A'
                    AND tb_master_product.outlet_code_relation = '$system_outlet_code'
                    AND tb_master_stock.stockable =  '1' 
                    ORDER BY tb_master_product.product_name ASC");

while ($row = mysqli_fetch_assoc($querySelectProduct)) {
    $output['suggestions'][] = [
        'value' => $row['product_code'],
        'nama'  => $row['product_name']
    ];
}

if (!empty($output)) {
    echo json_encode($output);
}
