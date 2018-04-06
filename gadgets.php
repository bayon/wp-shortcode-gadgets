<?php
/* gadgets.php are functions to be added to wordpress functions.php file for UI components */



function group_of_gadgets_shortcode( $atts, $content = null ) {
      return '<div style="width:100%;float:left;">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'group_of_gadgets', 'group_of_gadgets_shortcode' );


function fn_make_gadget_1($atts){
     $a = shortcode_atts( array(
        'title' => 'title of something',
        'href' => '#hrefofanchor',
        'delay' => '0'
    ), $atts );

 
    $html = '
        <style>
        .box-rounded-right{
            padding: 20px 20px 0px;
            margin-right:2%;
            margin-top:2%;
            min-height: 350px;
            border-top-right-radius: 30px; 
            background-color:hsl(208, 12%, 30%);
            width:31%;
            float:left;
        }
        .box-rounded-right a{
            color: white;
        }
         @media (min-width: 0px) and (max-width: 768px) { 
                .box-rounded-right{
                    width:100%;
                }
        }

        </style>                
        
        <div class="box-rounded-right  animated fadeInLeft delay-'.$a["delay"].'"  >
                <a href="'.$a["href"].'">
                    <h3>'.$a["title"].'</h3>
                </a>
                <a href="'.$a["href"].'">'.$a["href"].'</a>
        </div>
         
        
    ';
    return $html;
    // USE CASE:  [group_of_gadgets][gadget-1 title="one" href="http://www.google.com" delay="1"][gadget-1  title="two"  href="http://www.google.com" delay="2"] [gadget-1  title="three"  href="http://www.google.com" delay="3" ][/group_of_gadgets]
}
add_shortcode( 'gadget-1',  'fn_make_gadget_1' );

/////////////////////////////////////////////////////////

function fn_button_1($atts){

     $a = shortcode_atts( array(
        'title' => 'title of something',
        'href' => '#hrefofanchor', 
    ), $atts );
    $html ='
<style>
a.button{color:#fff;}
.button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff ;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
 

<a class="button" href="'.$a["href"].'"  >'.$a["title"].'</a>
    ';

    return $html;
}
add_shortcode('button-1','fn_button_1');
////////////////////////////////////////////////////////

function fn_button_hover($atts){

     $a = shortcode_atts( array(
        'title' => 'title of something',
        'href' => '#hrefofanchor', 
    ), $atts );
    $html ='
<style>
a.button{color:#fff;}
 .button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: "\00bb";
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
 

<a class="button" href="'.$a["href"].'"  ><span>'.$a["title"].' </span></a>';

    return $html;
}
add_shortcode('button-hover','fn_button_hover');
//////////////////////////////////////////////////////////////////


function group_of_accordions_shortcode( $atts, $content = null ) {

    $html = '
    <style>
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.active, .accordion:hover {
    background-color: #ccc; 
}

.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}
</style>
<div style="width:100%;float:left;">' . do_shortcode($content) . '</div>
    ';
    $html .= '

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>
    ';




      return $html;
      /*
      USAGE:
      [group_of_accordions][accordion title="Lorem" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."][accordion title="Ipsum"  content="Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."][accordion title="DOLOR"  content="Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."][/group_of_accordions]

      */
}
add_shortcode( 'group_of_accordions', 'group_of_accordions_shortcode' );

 
function fn_accordion($atts){

     $a = shortcode_atts( array(
        'title' => 'title of something',
        'content' => 'content', 
    ), $atts );
    $html ='
 
<button class="accordion">'.$a["title"].'</button>
<div class="panel">
    <p>'.$a["content"].'</p>
 
</div>
 

 ';

    return $html;
}
add_shortcode('accordion','fn_accordion');
/////////////////////////////////////////////////////////////////////
