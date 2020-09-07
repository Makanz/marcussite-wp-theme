jQuery(document).ready(function($){

    // Variables
    var $container = $('#content');

	$('div#menu ul li').mouseleave(function(){
		$(this).stop().animate({ paddingTop: '0' }, 100);
    }).mouseenter(function(){
        $(this).animate({ paddingTop: '5px' }, 250);
    });

    $('div.news-item').mouseleave(function(){
		$(this).stop().animate({ top: tVal }, 100);
    }).mouseenter(function(){
        tVal = $(this).css('top');
        $(this).animate({ top: "-=5px" }, 250);
    });

	$('#content').imagesLoaded( function() {

        $('#content').masonry({
            //isAnimated: false,
            // columnWidth: 310,
            itemSelector: '.news-item',
            columnWidth: '.news-item',
            transitionDuration: 0
        });

		$('.catIcon').hide();
		$('.catIcon').fadeIn('fast');

    });

    var infiniScrollPage = 1;
    var killScroll = false;
    var postID = 0;

    $(window).scroll(function() {
        if (killScroll == false) {
            if($(window).scrollTop() + $(window).height() >= $(document).height()-($container.find('div.news-item').height()*2)) {
                killScroll = true;
                $container.find('.news-item.fade').removeClass('fade').removeClass('in');
                // Load more items
                //console.log("Show more posts");
                infiniScrollPage++;

                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    cache: false,
                    data: {
                        action: 'LoadMorePosts',
                        currentPage: infiniScrollPage,
                        postID: postID
                    },
                    success: function(data, textStatus, XMLHttpRequest){
                        $('#content').append( data );
                        $('#content').imagesLoaded(function() {
                        $('#content').masonry('reloadItems');
                        $('#content').masonry( 'layout' );
                        //$('#content').find('.news-item.fade').addClass('in');
                        $('#content').find('.news-item').addClass('animate');
                            killScroll = false;
                        });

                        $('div.news-item').mouseleave(function(){
                            $(this).stop().animate({ top: tVal }, 100);
                        }).mouseenter(function(){
                            tVal = $(this).css('top');
                            $(this).animate({ top: "-=5px" }, 250);
                        });
                    },
                    error: function(MLHttpRequest, textStatus, errorThrown){
                        alert(errorThrown);
                    }
                });

            }
        }
    });

});
