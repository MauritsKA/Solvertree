@extends('layouts.master')

@section('content')
<a id="top"></a>
<div class="cover">
<div class="coveroverlay">
  <div class="container">

<div class="titlebox">
    <h1>Solvertree</h1>
</div>

<div class="treebox">
<div class="tree">
    <div class="root" id="1">
        <div class="leaf" onclick="branch('1')"><div class="type">Environment</div></div>
        <div class="branch" id="b1">
            <div class="root" id="1-1">
                <div class="leaf" onclick="branch('1-1')"><div class="type">Oceans</div></div>
                <div class="branch" id="b1-1">
                    <div class="root" id="1-1-1">
                        <div class="leaf"><div class="type">Fishing</div></div>
                        <div class="branch" id="b1-1-1"></div>
                    </div>
                    <div class="root" id="1-1-2" >
                        <div class="leaf" onclick="branch('1-1-2')"><div class="type">Pollution</div></div>
                        <div class="branch" id="b1-1-2">
                            <div class="root" id="1-1-2-1">
                                <div class="leaf"><div class="type">Plastics</div></div>
                                <div class="branch" id="b1-1-2-1"></div>
                            </div> 
                            <div class="root" id="1-1-2-2">
                                <div class="leaf"><div class="type">Oil</div></div>
                                <div class="branch" id="b1-1-2-2"></div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="root" id="1-2">
                <div class="leaf" onclick="branch(1.1)"><div class="type">Forests</div></div>
                <div class="branch" id="b1-2"></div>
            </div>
            <div class="root" id="1-3">
                <div class="leaf" onclick="branch(1.1)"><div class="type">Atmosphere</div></div>
                <div class="branch" id="b1-3"></div>
            </div>
        </div>
    </div>
    
    <div class="root" id="2">
        <div class="leaf" ><div class="type">Security</div></div>
        <div class="branch" id="b2"></div>
    </div>
    <div class="root" id="3">
        <div class="leaf" ><div class="type">Health</div></div>
        <div class="branch" id="b3"></div>
    </div>
    <div class="root" id="4">
        <div class="leaf" ><div class="type">Welfare</div></div>
        <div class="branch" id="b4"></div>
    </div>
</div>
</div>

  </div>
</div>
</div>


<script>
$( ".branch" ).hide();

function branch(id) {
    console.log('CLICKED ON '+id)
    // Toggle parallel leaves in branch
    

    // Toggle branch in root
    var branch = $( "#b"+id );
    console.log('toggle branch ' + id)

    if (branch.is(":hidden")){
        branch.slideToggle();
    } else {
        branch.toggle();
    }

    togglesubbranch(id)

    toggleleaves(id)

}

function togglesubbranch(id){
      var nextsubid = id+"-1";
      var branch = $( "#b"+nextsubid );

      while(exists(branch)){
            togglesubbranch(nextsubid)

            if (branch.is(":visible")){
                branch.toggle();
                toggleleaves(nextsubid)
            }
             
            nextsubid = increment_last(nextsubid)
            var branch = $( "#b"+nextsubid );
        }

}

function toggleleaves(id){

    // Toggle leaves left in branch
    previd = decrement_last(id)
    var leaf = $( "#"+previd );

    while(exists(leaf)){
        leaf.toggle();
        console.log('toggle leaf '+previd)
        previd = decrement_last(previd)
        var leaf = $( "#"+previd );
    }

    // Toggle leaves right in branch
    nextid = increment_last(id)
    var leaf = $( "#"+nextid );

    while(exists(leaf)){
        leaf.toggle();
        console.log('toggle leaf '+nextid)
        nextid = increment_last(nextid)
        var leaf = $( "#"+nextid );
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
