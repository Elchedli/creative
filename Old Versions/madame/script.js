$('.container').click(function () {
    var countTo = $('.counter').attr('data-count');
    $({ countNum: $('.counter').text() }).animate(
        {
            countNum: countTo
        },
        {
            duration: 13000,
            easing: 'linear',
            step: function () {
                $('.counter').text(Math.floor(this.countNum * 100) / 100);
            },
            complete: function () {
                $('.counter').text(this.countNum);
                $('.wheel').css('animation-play-state', 'paused');
            }
        }
    );
    $('.wheel').css('animation', 'rotation 5s linear infinite');
});