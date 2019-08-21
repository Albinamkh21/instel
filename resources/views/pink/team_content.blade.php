@if (count($errors) > 0)
    <div class="box error-box">

        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

    </div>
@endif

@if (session('status'))
    <div class="box success-box">
        {{ session('status') }}
    </div>
@endif

<div id="content-page" class="content group">
    @if($team)

            <!-- START CONTENT -->
            <div id="content-page" class="content group">
                <div class="hentry group">
                    <div class="accordion-container">
                        @foreach($team as $team_member)
                        <h3 class="accordion-title">{{ $team_member->position }}</h3>
                        <div class="accordion-item">
                            <div class="accordion-item-thumb">
                                <img src="{{ asset(env('THEME')) }}/images/content/team/{{  $team_member->img->mini }}" alt="{{ $team_member->name }}" style="width:129px;" />
                            </div>
                            <div class="accordion-item-content" style="margin-left: 161px;">
                                <h4>{{ $team_member->position }}</h4>
                                {!!  $team_member->text  !!}
                                <div class="clear space"></div>
                               <!-- <a href="# " class="socials-small facebook-small" title="Facebook">facebook</a>
                                <a href="#" class="socials-small rss-small" title="Rss">rss</a>
                                <a href="#" class="socials-small twitter-small" title="Twitter">twitter</a>
                                <a href="#" class="socials-small youtube-small" title="Youtube">youtube</a>
                                <a href="#" class="socials-small flickr-small" title="Flickr">flickr</a>
                                <a href="#" class="socials-small linkedin-small" title="Linkedin">linkedin</a>
                                -->
                            </div>
                        </div>
                        <div class="clear"></div>
                        @endforeach
                    </div>
                    <div class="clear"></div>
                    <script>
                        jQuery(document).ready(function($){
                         //   $('.accordion-title').addClass('active');
                            $('.accordion-item').css('display', 'block');

                            /*
                            $('.accordion-title').click(function(){
                                if( !$(this).hasClass('active') ) {
                                    $('.accordion-title').removeClass('active').find('span').addClass('icon-plus-sign').removeClass('icon-minus-sign');
                                    $('.accordion-item').slideUp();

                                    $(this).toggleClass('active')
                                        .find('span').removeClass('icon-plus-sign').addClass('icon-minus-sign').parent()
                                        .next().slideToggle();
                                }
                            }).filter(':first').click();
                            */

                        });
                    </script>
                </div>
                <!-- START COMMENTS -->
                <div id="comments">
                </div>
                <!-- END COMMENTS -->
            </div>
            <!-- END CONTENT -->

    @endif
</div>