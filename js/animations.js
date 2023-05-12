const fade = $("#fade");
const roll = $("#roll");
const bump = $("#bump");

fadeInElement(fade);
rollElement(roll);
bumpElement(bump)

function fadeInElement(element)
{
    $(element).hide();
    $(element).fadeIn(500);
}

function rollElement(element)
{
    $(element).hide();
    $(element).slideDown(1300)
}

function bumpElement(element)
{
    $(element).css({
        'position': 'relative',
        'top': '-400px'
    });
  
    $(element).animate({
        'top': '60px'
    }, 500, 'swing', function() {
        $(element).animate({
            'top': '-60px'
        }, 400, 'swing', function() {
            $(element).animate({
                'top': '25px'
            }, 370, 'swing', function() {
                $(element).animate({
                    'top': '-25px'
                }, 350, 'swing', function() {
                    $(element).animate({
                        'top': '0px'
                    }, 300, 'swing');
                });
            });
        });
    });
}