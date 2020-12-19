jQuery(document).ready(function($){
    $('.ui.dropdown').dropdown();

    $('#messageform').on('submit', function(e){
        e.preventDefault();

        let res = $('#mess_result');
        let url = $(this).attr('action');
        let request_method = $(this).attr("method");
        let mess = $(this).serializeArray();

        $.ajax({
            url: url,
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: request_method,
            data: mess

        }).done(function(response){
            res.html('<div class="w-full bg-green-500 p-3 rounded text-white">Your message was sent successfully!</div>').fadeOut(4000);

        }).fail(function(response) {
            res.html('<div class="w-full bg-red-500 p-3 rounded text-white">Could not reach server, please try again later.</div>').fadeOut(4000);
        });
    });

    $('#commentform').on('click','#submitComment', function(e){
        e.preventDefault();

        let comParent = $(this);
        $('.wrap_result').
        css('color','green').
        text('We are saving your comment! Be patient!!').
        fadeIn(1000,function() {

            let data = $('#commentform').serializeArray();
            
            $.ajax({

                url:$('#commentform').attr('action'),
                data:data,
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                datatype:'JSON',
                success: function(html) {
                    if(html.error) {
                        $('.wrap_result').css('color','red').append('<br /><strond>Attention: </strong>' + html.error.join('<br />'));
                        $('.wrap_result').delay(2000).fadeOut(1000);
                    }
                    else if(html.success) {
                        $('.wrap_result')
                            .append('<br /><strong>Youre comment has been saved! We\'ll show it after moderation!</strong>')
                            .delay(2000)
                            .fadeOut(1000,function() {

                                if(html.data.parent_id > 0) {
                                    comParent.parents('div#respond').prev().after('<ul class="commentChild">' + html.comment + '</ul>');
                                }
                                else {
                                    if($.contains('#comments','ul.commentlist')) {
                                        $('ul.commentlist').append(html.comment);
                                    }
                                    else {

                                        $('#respond').before('<ul class="commentlist">' + html.comment + '</ul>');

                                    }
                                }
                                $('#cancel-comment-reply-link').click();
                            })

                    }
                },
                error:function() {
                    $('.wrap_result').css('color','red').append('<br /><strond>Error: </strong>');
                    $('.wrap_result').delay(2000).fadeOut(500, function() {
                        $('#cancel-comment-reply-link').click();
                    });
                }
            });
        });
    });
    
}); // end ready