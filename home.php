<style type="text/css">
<!--
a:link {
    color: #ffffff;
}
body,td,th {
    color: #000000;
}
a:visited {
    color: #ffffff;
}
a:hover {
    color: #000000;
    background:-moz-linear-gradient(top,#B4F6FF 5px,#63D0FE 10px,#58B0E7 10px);
}
a:active {
    color: #ffffff;
}
a {
    font-weight: bold;
}
-->
</style>
<marquee scrolldelay="100" truespeed="truespeed" align="left"><h2>Selamat Datang di Sistem Informasi Akademik SMK Negeri 1 Pleret</h2>
</marquee>
<script type="text/javascript">
function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

  
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

</script>

<style type="text/css">
#slideshow {
    position:relative;
	left: 20%;
    height:350px;
}

#slideshow IMG {
    position:absolute;
    top:0;
    left:0;
    z-index:8;
    opacity:0.0;
}

#slideshow IMG.active {
    z-index:10;
    opacity:1.0;
}

#slideshow IMG.last-active {
    z-index:9;
}

</style>
<div id="slideshow">
<?php
function isJPG($filename){
    $ext = substr($filename, -4);
    if($ext == '.jpg'){
        return true;
    }else{
        return false;
    }
}

$limg="";
$d = dir('img/slide/');
while (false !== ($filename = $d->read())) {
    if(isJPG($filename)){      
		
		echo '<img src="img/slide/'.$filename.'" class="active" height="400" width="700">';
		
    }
}
$d->close();
?>
</div>

