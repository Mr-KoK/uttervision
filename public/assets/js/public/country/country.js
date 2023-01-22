$(document).ready(function () {
    $('._play').on('click', function () {
        let src = $('._video-src').val();
        let video = '<video width="100%" height="100%" controls>\n' +
            '  <source src="'+src+'" type="video/mp4">\n' +
            'Your browser does not support the video tag.\n' +
            '</video>'
        $('.video-section .video').html(video)
    })
})