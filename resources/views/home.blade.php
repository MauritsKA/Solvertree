@extends('layouts.master')

@section('content')
<a id="top"></a>
<div class="container">

<h1>Solvertree</h1>

<div class="tree">
    <div class="root">
        <div class="leaf" id="1" onclick="branch('1')"><div class="type">Environment</div></div>
        <div class="branch" id="b1">
            <div class="root" id="1-1">
                <div class="leaf" onclick="branch('1-1')"><div class="type">Oceans</div></div>
                <div class="branch" id="b1-1">
                    <div class="root" id="1-1-1">
                        <div class="leaf"><div class="type">Fishing</div></div>
                    </div>
                    <div class="root" id="1-1-2" >
                        <div class="leaf" onclick="branch('1-1-2')"><div class="type">Pollution</div></div>
                        <div class="branch" id="b1-1-2">
                            <div class="root" id="1-1-2-1">
                                <div class="leaf"><div class="type">Plastics</div></div>
                            </div> 
                            <div class="root" id="1-1-2-2">
                                <div class="leaf"><div class="type">Oil</div></div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="root" id="1.1">
                <div class="leaf" onclick="branch(1.1)"><div class="type">Forests</div></div>
            </div>
            <div class="root" id="1.1">
                <div class="leaf" onclick="branch(1.1)"><div class="type">Atmosphere</div></div>
            </div>
        </div>
    </div>
    
    <div class="root" id="2"><div class="leaf" ><div class="type">Security</div></div></div>
    <div class="root" id="3"><div class="leaf" ><div class="type">Health</div></div></div>
    <div class="root" id="4"><div class="leaf" ><div class="type">Welfare</div></div></div>
</div>


</div>

<script>
$( ".branch" ).hide();

function branch(id) {
    var branch = $( "#b"+id );
    branch.slideToggle();
    nextid = increment_last(id)
    var leaf = $( "#"+nextid );
    
    while(exists(leaf)){

        leaf.toggle();
        nextid = increment_last(nextid)
        var leaf = $( "#"+nextid );
    }

    previd = decrement_last(id)
    var leaf = $( "#"+previd );
    console.log(previd)
    while(exists(leaf)){
        previd = decrement_last(previd)
        var leaf = $( "#"+previd );
    }
}

function increment_last(v) {
    return v.replace(/[0-9]+(?!.*[0-9])/, parseInt(v.match(/[0-9]+(?!.*[0-9])/), 10)+1);
}

function decrement_last(v) {
    return v.replace(/[0-9]+(?!.*[0-9])/, parseInt(v.match(/[0-9]+(?!.*[0-9])/), 10)-1);
}

function exists(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return true;
    }
    return false;
}


</script>
@endsection
