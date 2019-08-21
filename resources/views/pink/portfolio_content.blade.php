@if($portfolios)      <!-- START CONTENT -->
        <div id="content-page" class="content group">

            <div class="hentry group">
                <div id="portfolio" class="portfolio-filterable">
                    <div class="gallery-filters">
                        <ul class="filters ">
                            <li class="segment-1 first"><a data-value="all" href="{{ route('portfolio.index') }}"> Все </a></li>
                         @foreach($categories as $category)
                            <li class="segment-2"><a href="{{ route('portfolio_category', ['category' => $category->alias]) }}" >{{$category->title}}</a></li>
                         @endforeach
                            <!--li class="segment-5">Web Design</li-->
                        </ul>
                    </div>
                    <div id="portfolio-gallery" class="internal_page_items internal_page_gallery">
                        <ul id="portfolio" class="three-columns">
                        <!--<ul class="gallery-wrap image-grid group">-->
                            @for ($i = 0; $i < count($portfolios); $i++)
                                <li class=" slide-{{$i+1}}  one-third   <?php if($i%3 == 0) echo ' first'; ?>   <?php if(($i+1)%3 == 0) echo ' last group'; ?>  ">
                                    <a class="thumb video" href="{{$portfolios[$i]->url}}?width=640&amp;height=480&amp;iframe=true&amp;modestbranding=1&amp;controls=0&amp;vq=hd360" rel="lightbox" title="{{$portfolios[$i]->title}}">
                                        <img src="{{ asset(env('THEME')) }}/images/portfolio/{{ $portfolios[$i]->img->mini }}" alt="1" title="1" /></a>
                                    <h4><a href="{{ route('portfolio.show', $portfolios[$i]->alias ) }}">{{$portfolios[$i]->title}}</a></h4>
                                </li>

                            @endfor
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!-- START COMMENTS -->
            <div id="comments">
            </div>
            <!-- END COMMENTS -->
        </div>
        <!-- END CONTENT -->
        <!-- START EXTRA CONTENT -->
        <!-- END EXTRA CONTENT -->
@endif


