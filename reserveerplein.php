<?php
    /*
    Plugin Name: ReserveerPlein
    Description: Plugin waarmee de reserveerwidget van ReserveerPlein.nl in je website embed kan worden.
    Version: 2.0
    Author: InforDB BV
    */
    
    /* [reserveerplein width="" height="" src=""] */

    function MijnReserveerPlein($atts) {
        extract(shortcode_atts(array(
            "width" => '100%',
            "height" => '',
            "src" => ''
            ), $atts));

        if(substr($src, 0, 26) !== 'https://reserveerplein.nl/'){
            return '<div>De ingevoerde shortcode is niet correct! Vraag de juiste code op via <a href="https://www.reserveerplein.nl">ReserveerPlein.nl</a></div>';
        } else {
            return '<iframe width="'.$width.'" frameborder="0" src="'.$src.'" class="reserveerwidget" id="reserveerwidget" >Uw browser kan deze reserveerwidget niet laden. Klik <a href="'.$src.'">hier</a> om uw reservering toch in te voeren.</iframe><script type="text/javascript"> var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent"; var eventer = window[eventMethod]; var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message"; var element = document.getElementById("reserveerwidget"); eventer(messageEvent,function(e) { if (e.data.indexOf("resize::") != -1) { var height = e.data.replace("resize::", ""); element.style.height = height+"px"; } if (e.data.indexOf("scrollToBottom::") != -1) { element.scrollIntoView({behavior: "smooth", block: "end", inline: "end"}); } if (e.data.indexOf("scrollFromBottom::") != -1) { element.scrollIntoView({behavior: "smooth", block: "start", inline: "start"}); } } ,false); </script>';
        }
    }

    add_shortcode("reserveerplein", "MijnReserveerPlein");

?>