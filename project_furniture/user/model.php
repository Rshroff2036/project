<?php 

class Model 
{
    public $conn="";
    function __construct()
    {
        $this->conn = new mysqli('localhost','root','','rahul',3307);

        // echo "connected..!";exit();
    }

    // select * from table
    function select($tbl)
    {
        $sql = "select * from $tbl";
        $run = $this->conn->query($sql);

        while($fetch = $run->fetch_object())
        {
            $arr[]= $fetch;
        }

        if(!empty($arr))
        {
            return $arr;
        }

    }

    //select * from tablename where  and id=12 and mobile =12312 and mobile =12312
    function select_where($tbl,$where)
    {
        $col_arr = array_keys($where);
        $val_arr = array_values($where);
        $sql = "select * from $tbl where 1=1";

        $i=0;
        foreach($where as $w)
        {
            $sql.= " and $col_arr[$i]='$val_arr[$i]'";
            $i++;
        }

        // echo $sql;exit();
        $run = $this->conn->query($sql);
        

        if(!empty($run))
        {
            return $run; 
        }

    }

    // select_join_where_multidata('cart','products','cart.fk = product.pk',uid)
    function select_join_where_multidata($tbl1,$tbl2,$on,$where)
     {
        $col_arr = array_keys($where);
        $val_arr = array_values($where);
        $sql = "select * from $tbl1 join $tbl2 on $on where 1=1";

        $i=0;
        foreach($where as $w)
        {
            $sql.= " and $col_arr[$i]='$val_arr[$i]'";
            $i++;
        }

        // echo $sql;exit();
        $run = $this->conn->query($sql);
        while($fetch = $run->fetch_object())
        {
            $arr[]= $fetch;
        }

        

        if(!empty($arr))
        {
            return $arr; 
        }

        
    }

    function select_where_multidata($tbl,$where)
    {
        $col_arr = array_keys($where);
        $val_arr = array_values($where);
        $sql = "select * from $tbl where 1=1";

        $i=0;
        foreach($where as $w)
        {
            $sql.= " and $col_arr[$i]='$val_arr[$i]'";
            $i++;
        }

        // echo $sql;exit();
        $run = $this->conn->query($sql);
        while($fetch = $run->fetch_object())
        {
            $arr[]= $fetch;
        }

        

        if(!empty($arr))
        {
            return $arr; 
        }

    }

    function insert($tbl,$data)
    {
        $col_arr = array_keys($data);//col1col2
        $col = implode(",",$col_arr);//col1,col2,

        $val_arr = array_values($data);//val1val2
        $val = implode("','",$val_arr);//val1,val2

        $sql = "insert into $tbl ($col) values('$val')";

        // insert into users (col1,col2) values ('val1','val2') // 'val1','val2'
        
        $run = $this->conn->query($sql);

        return $run;
        
        
    }

    //update tableName set 'colName'='value','c'=v where  and c=r
    function update($tbl,$data,$where)
    {
        $col_arr = array_keys($data);//col1col2
        $val_arr = array_values($data);//val1val2      

        $update = "update $tbl set ";
        $i=0;
        $count = count($data);
        foreach($data as $d)
        {
           if($count<=$i+1)
           {
            $update.="$col_arr[$i]='$val_arr[$i]'";
           
           }
           else 
           {
            $update.="$col_arr[$i]='$val_arr[$i]', ";
            $i++;
           }
        }
        $update.="where 1=1 "; 
        $wcol_arr = array_keys($where);//col1col2
        $wval_arr = array_values($where);//val1val2

        $j=0;
        foreach($where as $w)
        {
            $update.="and $wcol_arr[$j]='$wval_arr[$j]'";
            $j++;
        }

        // echo $update;exit();
        $run = $this->conn->query($update);
        return $run;
        
    }

    // delete from table where c=v 
    function delete_where($tbl,$where)
    {
        $col_arr = array_keys($where);//col1col2
        $val_arr = array_values($where);//val1val2 

        $del = "delete from $tbl where 1=1 ";
        $i=0;
        foreach($where as $w)
        {
            $del.="and $col_arr[$i]='$val_arr[$i]'";
            $i++;
        } 

        $run = $this->conn->query($del);

        return $run;

    }}