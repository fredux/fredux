<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'computadores';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$columns = array(
    array(
        'db' => 'id',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
            // Technically a DOM id cannot start with an integer, so we prefix
            // a string. This can also be useful if you have multiple tables
            // to ensure that the id is unique with a different prefix
            return 'row_'.$d;
        }
    ),
    array( 'db' => 'cpf',  'dt' => 'cpf' ),
    array( 'db' => 'patrimonio_monitor2',  'dt' => 'patrimonio_monitor2' ),
    array( 'db' => 'ip_2',  'dt' => 'ip_2' ),
    array( 'db' => 'mac_2',  'dt' => 'mac_2' ),
    array( 'db' => 'observacao',  'dt' => 'observacao' ),
    array( 'db' => 'usuario',  'dt' => 'usuario' ),
    array( 'db' => 'setor', 'dt' => 'setor' ),
    array( 'db' => 'nome_computador', 'dt' => 'nome_computador' ),
    array( 'db' => 'patrimonio_cpu', 'dt' => 'patrimonio_cpu' ),
    array( 'db' => 'patrimonio_monitor1', 'dt' => 'patrimonio_monitor1' ),
    array( 'db' => 'ip_1','dt' => 'ip_1' ),
    array( 'db' => 'mac_1','dt' => 'mac_1' ),
);
 
// SQL server connection information
$sql_details = array(
    'user' => '',
    'pass' => '',
    'db'   => 'fredux.db',
    'host' => 'localhost'
);

 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);