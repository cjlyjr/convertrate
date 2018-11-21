<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangeController extends Controller
{
    public function realtimeChange()
{
    // set API Endpoint and API key 
$endpoint = 'latest';
$access_key = 'f1974a5e90e3c0a5ebe1add8559bcd12';

// Initialize CURL:
$ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
// Store the data:


$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
//$exchangeRates = json_decode($json, true);

// Access the exchange rate values, e.g. GBP:
//echo $exchangeRates['rates']['GBP'];
//return $exchangeRates['rates']['GBP'];
return $json;
}
   
public function index(Request $request )
    {
      $countrys=array("Popular currencies"=>array(["Euro","EUR"],["USA","USD"],["United-Kingdom","GBP"],["Denmark","DKK"],["Turkey","TRY"],["Thailand","THB"],["Croatia","HRK"],["Poland","PLN"],["Norway","NOK"],["Czech-Republic","CZK"],["Hungary","HUF"]),
      "A"=>array(["Afghanistan","AFN"],["Australian","Dollan"]),
      "B"=>array(["Bahamas","BSD"],["Bahrain","BHD"],["Barbados","BBD"],["Bulgaria","BGN"],),
      "C"=>array(["Canada","CAD"],["Chile","CLP"],["China","RMB"],["Croatia","HRK"],["Croatia","HRK"],["Czech-Republic","CZK"]),

      "D"=>array(["Denmark","DKK"],["Dominican Republic","DOP"]),
      "E"=>array(["Egypt","EGP"]),
      "F"=>array(["Fiji","FJD"]),
      "H"=>array(["Hungary","HUF"]),
    
      "I"=>array(["Iceland","ISK"],["India","INR"],["Indonesia","IDR"],["Israel","ILR"]),
      "J"=>array(["Jamaica","JMD"],["Japan","JPY"],["Jordan","JOD"]),
      "K"=>array(["Kenya","KES"]),
     
      "M"=>array(["Malaysia","MYR"],["Mauritius","MUR"],["Mexico","MXN"]),
      "N"=>array(["New Zealand","NZD"],["Norway","NOK"]),
      "O"=>array(["Oman","OMR"]),
      "P"=>array(["Peru","PEN"],["Poland","PLN"]),
      
      "R"=>array(["Romania","RON"],["Russia","RUB"]),
      "S"=>array(["Singapore","SGD"],["Switzerland","CHF"]),
      "T"=>array(["Taiwan","TWD"],["Thailand","THB"],["Trinidad-and-Tobago","TTD"],["Turkey","TRY"]),
     
      "U"=>array(["United Arab Emirates","AED"],["United-Kingdom","GBP"]),
     
      "V"=>array(["Vietnam","VND"])
    
    
    
    );


        $rates=$this->realtimeChange();
        $svalue1 = session('key1');
        $svalue2 = session('key2');
        
         
return view('index',['rates'=>$rates,'countrys'=>$countrys,'svalue1'=>$svalue1,'svalue2'=>$svalue2]);
    }

    public function test(Request $request)
    {
        
       
        $title1=$request->title1;
        $title2=$request->title2;
        session(['key1' =>  $title1]);
        session(['key2' =>  $title2]);
        if($title1=="" || $title2=="")
        {
            return redirect('/')->with('error','Please enter Currery');
        }
        if($title2!="EUR")
        {
            return redirect('/')->with('error','Sorry,the free fixor only suppot base EUR');
        }
        return redirect('/');
        //return redirect('/')->with('success',$title1,$title2);
           
        
    }
    
}
