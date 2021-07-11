@if (count($errors)>0)
    @foreach ($errors->all() as $error)        
        <div id='snackbar' class='text-center' style='background-color: rgba(255, 174, 0, 0.877)'>
            <button class='btn-close' onclick='msgClose()'> &#10006; </button>
            {{ $error }}
        </div>
    @endforeach
    
@endif

@if (session('success'))    
    <div id='snackbar' class='text-center' style='background-color: green'>
        <button class='btn-close' onclick='msgClose()'> &#10006; </button>
        {{ session('success') }}
    </div>
@endif

@if (session('error'))    
    <div id='snackbar' class='text-center' style='background-color: red'>
        <button class='btn-close' onclick='msgClose()'> &#10006; </button>
        {{ session('error') }}
    </div>
@endif




{{-- Start Snack Bar Style --}}
<style>    
    #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #036e1c;
        font-weight: bold;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 10000;
        left: 50%;
        top: 12px;
        font-size: 12px;
    }
    #snackbar .btn-close {
        color: #fff;
        border: none;
        background: transparent;
        font-size: .5em;
        padding: 5px;
        font-size: 1em;
        position: absolute;
        right: 0;
        top: 0;
        
    }
    #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.9s, fadeout 0.5s 4.6s;
        animation: fadein 0.9s, fadeout 0.5s 4.6s;
    }
    @-webkit-keyframes fadein {
        from {top: 0; opacity: 0;} 
        to {top: 12px; opacity: 1;}
    }
    @keyframes fadein {
        from {top: 0; opacity: 0;}
        to {top: 12px; opacity: 1;}
    }
    @-webkit-keyframes fadeout {
        from {top: 12px; opacity: 1;} 
        to {top: 0; opacity: 0;}
    }
    @keyframes fadeout {
        from {top: 12px; opacity: 1;}
        to {top: 0; opacity: 0;}
    }
</style>
{{-- End Snack Bar Style --}}
{{-- Start Snack Bar Js --}}
<script>
    function myFunction() {
        'use strict';
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 5000);
    }
    myFunction();
    function msgClose() {
        var close = document.getElementById("snackbar");
        close.style.display = "none";
        close.className = close.className.replace("show", "");
    }
</script>
{{-- End Snack Bar Js --}}
