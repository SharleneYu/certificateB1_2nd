<?php

class DB{

    protected $table;
    protected $pdo;
    protected $dsn="mysql:host=localhost; charset=utf8; dbname=db11";
    protected $links;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn, 'root', '');
    }


    protected function a2s($array){
        foreach($array as $key=>$value){
            if($key!='id'){
                $tmp[]="`$key`='$value'";
            }
        }
        return $tmp;
    }

    protected function sql_one($sql, $arg){
        if(is_array($arg)){
            $tmp=$this->a2s($arg);
            $sql=$sql. " WHERE ".join(" && ",$tmp);
        }else{
            $sql=$sql. " WHERE `id`='$arg' ";
        }
        return $sql;
    }

    protected function sql_all($sql, ...$arg){
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp=$this->a2s($arg[0]);
                $sql=$sql. " WHERE ".join(" && ",$tmp);
            }else{
                $sql=$sql.$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql=$sql.$arg[1];
        }
        return $sql;
    }

    protected function math($math, $col, ...$arg){
        $sql=" SELECT $math($col) FROM $this->table ";
        $sql= $this->sql_all($sql,...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }

    
    // CRUD
    function all(...$arg){
        $sql= " SELECT * FROM $this->table ";
        $sql= $this->sql_all($sql,...$arg);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count(...$arg){
        $sql= " SELECT count(*) FROM $this->table ";
        $sql= $this->sql_all($sql,...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($arg){
        $sql= " SELECT * FROM $this->table ";
        $sql= $this->sql_one($sql,$arg);
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($arg){
        $sql= " DELETE FROM $this->table ";
        $sql= $this->sql_one($sql,$arg);
        return $this->pdo->exec($sql);
    }

   
    function save($arg){
        if(isset($arg['id'])){
            $tmp=$this->a2s($arg);
            $sql=" UPDATE $this->table SET ".join(",",$tmp);
            $sql= $sql." WHERE `id`= '{$arg['id']}' ";

        }else{
            $keys=join("`,`",array_keys($arg));
            $values=join("','",$arg);
            $sql="INSERT INTO $this->table (`".$keys."`) VALUES ('".$values."')";
        }
        return $this->pdo->exec($sql);
    }

    function max($col, ...$arg){
        return $this->math('max', $col, ...$arg);
    }

    function min($col, ...$arg){
        return $this->math('min', $col, ...$arg);
    }

    function sum($col, ...$arg){
        return $this->math('sum', $col, ...$arg);
    }


    //views

    function view($path, $arg=[]){
        extract($arg);
        include($path);
    }

    function paginate($num, $arg=null){
        $total=$this->count($arg);
        $pages=ceil($total/$num);
        $now=$_GET['p']??1;
        $start=($now-1)*$num;

        $rows=$this->all($arg, " LIMIT $start, $num ");

        $this->links=[
            'total'=>$total,
            'pages'=>$pages,
            'now'=>$now,
            'start'=>$start,
            'rows'=>$rows,
            'table'=>$this->table
        ];
        return $rows;
    }


    function links(){
        $html="";

        if($this->links['now']-1>=1){
            $prev=$this->links['now']-1;
            $html.="<a href='?do=$this->table&p=$prev'>&lt;</a>";
        }

        for($i=1; $i<$this->links['pages'];$i++){
            $size=($this->links['now']==$i)?'24px':'18px';
            $html.="<a href='?do=$this->table&p=$i' style='font-size:$size'>$i</a>";
        }

        if(($this->links['now']+1)<= ($this->links['pages'])){
            $next=$this->links['now']+1;
            $html.="<a href='?do=$this->table&p=$next'>&gt;</a>";
        }
        return $html;
    }

    

}
//DB ends
?>

<!-- $html.="<a href=''></a>"; -->