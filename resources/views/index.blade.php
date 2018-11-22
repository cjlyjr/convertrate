@extends('layouts.app')
@section('content')
<?php 
$exchangeRates = json_decode($rates, true);
if($svalue1!="" && $svalue2!="" && $rates!="")
{
 echo '<p id="crates">' .$svalue1. ' to EUR is ' .$exchangeRates['rates'][$svalue1].'</p>';
}
else if($rates=="")
{
    echo '<p id="crates"></p>';
}
$results=array();

foreach($countrys as $key1=>$item1)
{
    foreach($item1 as $key2=>$item2)
    {
      foreach(str_split($item2[1],3) as $key3=>$item3)
      {
        $result[$item3] = $item3;
      }
     
        
    }
}
    if(!in_array($svalue1,$result) && $svalue1!="")
    {
        echo '<p id="crates">Sorry,Cannot find this currency in list</p>';
    }
    
?>
{!! Form::open(['action' => ['ChangeController@test'],'id'=>'sbform','method'=>'POST']) !!}
<div class="form-group">
   
    
  
    <div class="row">
        <div id="divib" class="col">
  <p>Currency I have:</p>
  <div class="input-group">
    {{Form::text('title1','',['id'=>'myInput','class'=>'form-control','placeholder'=>'Select Currency'])}}
    
        
        <span id="inputid"></span>   
    </div>
        
 
<div id="divinput">
<table id="cinput" class="table table-striped">
    @foreach($countrys as $key1=>$item1)
    <th>{{$key1}}</th>
    @foreach($item1 as $key2=>$item2)
<tr class="imgsize">
    <td>
        <img src="css/icon/{{$item2[0]}}.png" class="img-fluid">
    </td>
    <td class="col-sm-4">{{$item2[0]}}
    </td>
    <td class="col-sm-6 rightcol">{{$item2[1]}}
    </td>
       
    
  
 
  </tr>
    @endforeach
   @endforeach
 
</table>
</div>

</div>
<div id="divob" class="col">
    <p>Currency I want:</p>
    <div class="input-group">
            {{Form::text('title2','EUR',['id'=>'myOutput','class'=>'form-control'])}}
            
            <span id="outputid"></span>   
        </div>
  
    <div id="divoutput">
        <table id="coutput" class="table table-striped">
            @foreach($countrys as $key1=>$item1)
            <th class="keyth">{{$key1}}</th>
            @foreach($item1 as $key2=>$item2)
        <tr class="imgsize">
            <td>
                <img src="css/icon/{{$item2[0]}}.png" class="img-fluid">
            </td>
            <td class="col-sm-4">{{$item2[0]}}
            </td>
            <td class="col-sm-6 rightcol">{{$item2[1]}}
            </td>
               
            
          
         
          </tr>
            @endforeach
           @endforeach
         
        </table>
        </div>
  </div>
 
  </div>
  
</div>
<div id='buttondiv'>
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
</div>
{!! Form::close() !!}
  
          

@if(!empty($svalue))
{{$svalue}}
@endif
    

@endsection
