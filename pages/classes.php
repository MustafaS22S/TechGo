<?php

abstract class Product{


    public static function products ($category){
        $qry = "SELECT * FROM PRODUCTS WHERE category='$category' order by created_at desc ";
        require_once('../login/config.php');
        $cn =mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt=mysqli_query($cn,$qry);
        $product = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
        mysqli_close($cn);
        return $product;
    }   

    public static function productMain ($product_id){
        $qry = "SELECT * FROM PRODUCTS WHERE product_id='$product_id'";
        require_once('../login/config.php');
        $cn =mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt=mysqli_query($cn,$qry);
        $productMain = mysqli_fetch_assoc($rslt);
        mysqli_close($cn);
        return $productMain;
    }

    public static function recommended ($product_id){
        $qry = "SELECT * FROM PRODUCTS WHERE product_id!='$product_id' ORDER BY RAND() LIMIT 4";
        require_once('../login/config.php');
        $cn =mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt=mysqli_query($cn,$qry);
        $rec = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
        mysqli_close($cn);
        return $rec;
    }

    public static function homeCards (){
        $qry = "SELECT * FROM PRODUCTS ORDER BY RAND() LIMIT 12";
        require_once('../login/config.php');
        $cn =mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt=mysqli_query($cn,$qry);
        $hc = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
        mysqli_close($cn);
        return $hc;
    }

    public static function newArrivals (){
        $qry = "SELECT * FROM PRODUCTS order by created_at desc LIMIT 3";
        require_once('../login/config.php');
        $cn =mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt=mysqli_query($cn,$qry);
        $na = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
        mysqli_close($cn);
        return $na;
    }   
   
    // public static function search ($search){
    //     $qry = "SELECT * FROM PRODUCTS WHERE product_name LIKE '%$search%' OR description LIKE '%$search%' ORDER BY created_at DESC";
    //     require_once('../login/config.php');
    //     $cn =mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
    //     $rslt=mysqli_query($cn,$qry);
    //     $searchResult = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
    //     mysqli_close($cn);
    //     return $searchResult;
    // }
}