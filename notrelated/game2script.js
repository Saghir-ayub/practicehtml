$( document ).ready(function() {
    myFunc($("#test"), 5);
    function myFunc( target_div, num_buttons ) {
        var buttons="";
        for ( var i=0; i<num_buttons; i++ ) {
            //                             added class ----------------v
            buttons += '<input type="button" id="button_'+i+'" class="mybuttons" value="button_'+i+'"></input>';
        }
        target_div.html( buttons );
        var doButtonPress = function( i ) {
            alert( i ); // I actually do something more complicated here, but it's not important now
        }
    
        //yes, mybuttons exist 
        $('.mybuttons').click(function () {
             doButtonPress(this.id.replace('button_', ''));
             //this.id.replace('button_', '') <- returns i value
        });
    }
    
});

