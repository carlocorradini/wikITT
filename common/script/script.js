"use strict";

$(document).ready(function() {
    //Input
    $(".coming-soon #form-newsletter input").on('keyup blur focus', function (e) {
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
        var email = $(this).find("input[name=email]");
        var btnProgress = $(".coming-soon .form .progress-btn");
        
        if(!email.val() || !isEmail(email.val())) {
            email.addClass("error");
            $($(this).find(".field-wrap")).transition("shake");
        } else {
            email.prop("disabled", true);
            btnProgress.prop("disabled", true);
            btnProgress.find(".btn").text("INVIANDO...");
            btnProgress.addClass("active");
            //Send Email To Register Service
            var url = "/common/php/newsletter.php";
            $.ajax({
                type: 'POST',
                url: url,
                data: { email: email.val() },
                success: function (data) {
                    //If all is correct show success message else prompt error
                    if (data.status) {
                        console.info("[NEWSLETTER]: "+data.message);
                        newsletterSuccess(email.val());
                    }
                    else
                        console.error("[NEWSLETTER]: "+data.message);
                }, error: function (jqXHR, status, error) {
                    console.error("[NEWSLETTER]: "+error);
                }
            });
        }
        return false;
    });
});
function newsletterSuccess(emailAddress) {
    //Set Name Email
    var nameMail = emailAddress.substring(0, emailAddress.indexOf("@"));
    $("#newsletter-success p > span").html(nameMail);
    //Animation Timer same as CSS -> 1.5s
    setTimeout(function() {
        $("#newsletter").transition("fly left");
        setTimeout(function() {
            $("#newsletter-success").transition("fly right");
        }, 600);
    }, 1500);
}
function isEmail(email) {
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(email);
};