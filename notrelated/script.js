$( document ).ready(function() {
var x = 0;
var progress_score=0;
$("#btn_a1").click(function(){
    if(x==1){
        if($("#btn_a2").hasClass("clicked")){
            $("#btn_a1").css('visibility','hidden').attr('hide','true');;
            $("#btn_a2").css('visibility','hidden').attr('hide','true');
            $(".btn-primary").removeClass("clicked");
            x=0;
            if (progress_score==3){
                alert("congrats you fuck");
            }
            else
            progress_score++;
        }
        else
        $(".btn-primary").removeClass("clicked");
        x=0;
        return;
    }
    else
    $("#btn_a1").addClass("clicked");
    x=1;
});

$("#btn_a2").click(function(){
    if(x==1){
        if($("#btn_a1").hasClass("clicked")){
            $("#btn_a1").css('visibility','hidden').attr('hide','true');
            $("#btn_a2").css('visibility','hidden').attr('hide','true');
            $(".btn-primary").removeClass("clicked");
            x=0;
            if (progress_score==3){
                alert(45+7);
            }
            else
            progress_score++;
        }
        else
        $(".btn-primary").removeClass("clicked");
        x=0;
        return;
    }
    else
    $("#btn_a2").addClass("clicked");
    x=1;
});

$("#btn_b1").click(function(){
    if(x==1){
        if($("#btn_b2").hasClass("clicked")){
            $("#btn_b1").css('visibility','hidden').attr('hide','true');
            $("#btn_b2").css('visibility','hidden').attr('hide','true');
            $(".btn-primary").removeClass("clicked");
            x=0;
            if (progress_score==3){
                alert(45+7);
            }
            else
            progress_score++;
        }
        else
        $(".btn-primary").removeClass("clicked");
        x=0;
        return;
    }
    else
    $("#btn_b1").addClass("clicked");
    x=1;
});

$("#btn_b2").click(function(){
    if(x==1){
        if($("#btn_b1").hasClass('clicked')){
            $("#btn_b1").css('visibility','hidden').attr('hide','true');
            $("#btn_b2").css('visibility','hidden').attr('hide','true');
            $(".btn-primary").removeClass("clicked");
            x=0;
            if (progress_score==3){
                alert(45+7);
            }
            else
            progress_score++;
        }
        else
        $(".btn-primary").removeClass("clicked");
        x=0;
        return;
    }
    else
    $("#btn_b2").addClass("clicked");
    x=1;
});

$("#btn_c1").click(function(){
    if(x==1){
        if($("#btn_c2").hasClass("clicked")){
            $("#btn_c1").css('visibility','hidden').attr('hide','true');
            $("#btn_c2").css('visibility','hidden').attr('hide','true');
            $(".btn-primary").removeClass("clicked");
            x=0;
            if (progress_score==3){
                alert(45+7);
            }
            else
            progress_score++;
        }
        else
        $(".btn-primary").removeClass("clicked");
        x=0;
        return;
    }
    else
    $("#btn_c1").addClass("clicked");
    x=1;
});

$("#btn_c2").click(function(){
    if(x==1){
        if($("#btn_c1").hasClass('clicked')){
            $("#btn_c1").css('visibility','hidden').attr('hide','true');
            $("#btn_c2").css('visibility','hidden').attr('hide','true');
            $(".btn-primary").removeClass("clicked");
            x=0;
            if (progress_score==3){
                alert(45+7);
            }
            else
            progress_score++;
        }
        else
        $(".btn-primary").removeClass("clicked");
        x=0;
        return;
    }
    else
    $("#btn_c2").addClass("clicked");
    x=1;
});

$("#btn_d1").click(function(){
    if(x==1){
        if($("#btn_d2").hasClass("clicked")){
            $("#btn_d1").css('visibility','hidden').attr('hide','true');
            $("#btn_d2").css('visibility','hidden').attr('hide','true');
            $(".btn-primary").removeClass("clicked");
            x=0;
            if (progress_score==3){
                alert(45+7);
            }
            else
            progress_score++;
        }
        else
        $(".btn-primary").removeClass("clicked");
        x=0;
        return;
    }
    else
    $("#btn_d1").addClass("clicked");
    x=1;
});

$("#btn_d2").click(function(){
    if(x==1){
        if($("#btn_d1").hasClass('clicked')){
            $("#btn_d1").css('visibility','hidden').attr('hide','true');
            $("#btn_d2").css('visibility','hidden').attr('hide','true');
            $(".btn-primary").removeClass("clicked");
            x=0;
            if (progress_score==3){
                alert(45+7);
            }
            else
            progress_score++;
        }
        else
        $(".btn-primary").removeClass("clicked");
        x=0;
        return;
    }
    else
    $("#btn_d2").addClass("clicked");
    x=1;
});

$("#showall").click(function(){
    $(".btn-primary").show();
    $(".btn-primary").css('visibility','visible').attr('hide','false');
    progress_score=0;
});

var parent = $("#shuffle");
var divs = parent.children();
while (divs.length) {
    parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
}

});







