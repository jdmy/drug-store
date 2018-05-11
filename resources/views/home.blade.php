@extends('layouts.app')

@section('content')
<style>
/* Custom Styles */
    ul.nav-tabs{
        width: 140px;
        margin-top: 20px;
        border-radius: 4px;
        border: 1px solid #ddd;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
    }
    ul.nav-tabs li{
        margin: 0;
        border-top: 1px solid #ddd;
    }
    ul.nav-tabs li:first-child{
        border-top: none;
    }
    ul.nav-tabs li a{
        margin: 0;
        padding: 8px 16px;
        border-radius: 0;
    }
    ul.nav-tabs li.active a, ul.nav-tabs li.active a:hover{
        color: #fff;
        background: #0088cc;
        border: 1px solid #0088cc;
    }
    ul.nav-tabs li:first-child a{
        border-radius: 4px 4px 0 0;
    }
    ul.nav-tabs li:last-child a{
        border-radius: 0 0 4px 4px;
    }
    ul.nav-tabs.affix{
        top: 30px; /* Set the top position of pinned element */
    }
</style>
<script>
$(document).ready(function(){
    $("#myNav").affix({
        offset: { 
            top: 125 
      }
    });
});
</script>
<body data-spy="scroll" data-target="#myScrollspy">
<div class="container">
    <div class="row">
        <div class="row">
        <div class="col-xs-3" id="myScrollspy">
            <ul class="nav nav-tabs nav-stacked" id="myNav">
                
                <li class="active"><a href="#section-1">第一部分</a></li>
                <li><a href="#section-2">第二部分</a></li>
                <li><a href="#section-3">第三部分</a></li>
                <li><a href="#section-4">第四部分</a></li>
                <li><a href="#section-5">第五部分</a></li>
            </ul>
        </div>
        <div class="col-xs-9">
            <h2 id="section-1">第一部分</h2>
            <h2 id="section-2">第二部分</h2>
            <h2 id="section-3">第三部分</h2>
            <h2 id="section-4">第四部分</h2>
            <h2 id="section-5">第五部分</h2>
        </div>
    </div>
</div>
</body>
@endsection
