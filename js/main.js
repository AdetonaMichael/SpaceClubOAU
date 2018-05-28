function createHttp() {
    var request;
    if (window.ActiveXObject) {
        try {
            request = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (error) {
            request = false;
        }

    } else {
        try {
            request = new XMLHttpRequest();
        } catch (e) {
            request = false;
        }
    }

    if (!request) {
        alert("Can't create http Request");
    } else {
        return request;
    }
}

function $$(element) {
    return document.getElementById(element);
}

var ajax = createHttp();

$(function() {
    //Select all links with hashes
    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });

});