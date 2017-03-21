"use strict";

$(document).ready(function() {
    //Input
    $(".coming-soon .form input").on('keyup blur focus', function (e) {
        var $this = $(this);
        var label = $this.prev("label");

        if(e.type === "keyup") {
            if($this.val() === '')
                label.removeClass("active highlight");
            else {
                label.addClass("active highlight");
                $this.removeClass("error");
            }
        } else if (e.type === "blur") {
            if($this.val() === '')
                label.removeClass('active highlight');
            else
                label.removeClass('highlight');   
        } else if (e.type === "focus") {
            if($this.val() === '')
                label.removeClass('highlight'); 
            else if($this.val() !== '')
                label.addClass('highlight');
        }
    });

    //Submit form
    $("#form-newsletter").submit(function() {
        var input = $(this).find("input");
        if(!input.val() || !isEmail(input.val())) {
            input.addClass("error");
            $($(this).find(".field-wrap")).transition("shake");
        } else {
            //Button Progress
            var btnProgress = $(".coming-soon .form .progress-btn");
            if (!btnProgress.hasClass("active")) {
                input.prop("disabled", true);
                btnProgress.find(".btn").text("INVIANDO...");
                btnProgress.addClass("active");
                //Time => CSS Animation
                setTimeout(function() {
                    btnProgress.removeClass("active");
                    //Send E-Mail via ajax
                    $("#newsletter").transition("fly left");
                    setTimeout(function() {
                        $("#newsletter-success").transition("fly right");
                    }, 600);
                }, 3000);
            }
        }
        return false;
    });
});
function isEmail(email) {
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(email);
};