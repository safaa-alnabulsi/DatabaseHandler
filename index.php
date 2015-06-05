<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require 'src/MySqlDatabase.php';
        //Connect to Database 
        $db = new MySqlDatabase('127.0.0.1', 'root', '', 'shop');
        $columns = '`name`, `gender`, `size`, `color`,`amount`';
        //---------------------------------------------------
        //insert records
        $records[] = array("'classical shoes'", "'male'", 43, "'black'", 33);
        $records[] = array("'dress'", "'female'", 3, "'red'", 4);
        $records[] = array("'skirt'", "'female'", 38, "'blue'", 20);
        $records[] = array("'shirt'", "'female'", 38, "'yellow'", 0);
        $records[] = array("'T-shirt'", "'male'", 40, "'white'", 0);

        $db->insert('product', $records, $columns);
        //---------------------------------------------------
        //select all products
        $allProducts = $db->select('product');
        echo "all products";
        var_dump($allProducts);
       // ---------------------------------------------------
        //select the males products which are amount in the shop is more than 0  
        $selectedColumns = 'DISTINCT `name`, `gender`, `size`, `color`, `amount`';
        $order = '`name`, `amount`, `size`';
        $where = array('gender="male"', 'amount!=0');
        $maleProducts = $db->select('product', $selectedColumns, $where, $order);
        echo "male products";
        var_dump($maleProducts);
        //---------------------------------------------------
        //select the females products which are amount in the shop is more than 0  
        $selectedColumns1 = 'DISTINCT `name`, `gender`, `size`, `color`, `amount`';
        $order1 = '`name`, `amount`, `size`';
        $where1 = array('gender="female"', 'amount!=0');
        $femaleProducts = $db->select('product', $selectedColumns1, $where1, $order1);
        echo "female products";
        var_dump($femaleProducts);
        //---------------------------------------------------
        //Delete the products that are no longer in the shop 
        $where2 = array('amount=0');
        $db->delete('product', $where2);
        //---------------------------------------------------
        //Update
        $where3 = array('color="red"');
        $values = array('color' => 'pink');
        $db->update('product', $values, $where3);
        $pinkProducts = $db->select('product','*','color="pink"');
        echo "pink products";
        var_dump($pinkProducts);
        //---------------------------------------------------
        ?>
    </body>
</html>
