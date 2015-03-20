{{-- #variable: $parentCategory $items --}}
{{-- 
// Get the parent category id by given item
$category = Item::find(14)->category()->first()['parent_id']; --}}
{{-- echo "$item->category_id portfolio-item"; --}}





@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Item List Page
@parent
@stop


@section('page-title')

<section id="page-title">

    <div class="container clearfix">
        <h3>Item List</h3>
        <span>Show all the published items</span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Item List</li>
        </ol>
    </div>

</section>

@stop





{{-- Page Content --}}
@section('content')

        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <div id="portfolio-ajax-wrap">
                        <div id="portfolio-ajax-container"></div>
                    </div>

                    <div id="portfolio-ajax-loader"><img src="images/preloader-dark.gif" alt="Preloader"></div>

                    <!-- Portfolio Filter
                    ============================================= -->
                    <ul id="portfolio-filter" class="clearfix">

                        <li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
                        @foreach ($parentCategory as $category)
                        <li><a href="#" data-filter={{".".$category->id }}>{{ $category->name }}</a></li>
                        @endforeach

                    </ul><!-- #portfolio-filter end -->


                    <ul id="portfolio-filter-right" class="clearfix">
                        <li class="activeFilter" id="time-sort"><a href="#" data-filter="*">默认时间</a></li>  
                        <li id="price-sort-asc"><a href="#" data-filter=".2">价格最低</a></li>
                        <li id="price-sort-dsc"><a href="#" data-filter=".2">价格最高</a></li>                
                    </ul>  


                    <div class="clear"></div>

                    <!-- Portfolio Items
                    ============================================= -->
                    <div id="portfolio" class="portfolio-nomargin portfolio-ajax clearfix">

                        @foreach($items as $item)                 

                        <article id="portfolio-item-1" data-loader="include/ajax/portfolio-ajax-image.php" class="<?php echo ($trigger?$item->parent_category_id:$item->category_id)." portfolio-item"; ?>" >
                            <div class="portfolio-image">
                                <a href={{ asset("assets/new_img/$item->picture_name")}}>
                                    <img src={{ asset("assets/new_img/$item->picture_name")}} alt="Open Imagination">
                                </a>

                                <div class="portfolio-overlay">
                                    <a href={{ asset("assets/new_img/$item->picture_name")}} class="left-icon" data-lightbox="image"><i class="icon-camera"></i></a>
                                    <a href="{{ route('singleItem', $item->id) }}"  class="right-icon"><i class="icon-external-link"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-desc">
                                <h3><a href="{{ route('singleItem', $item->id) }}">{{ str_limit($item->title, $limit = 19,$end = "...")}}</a></h3>
                                {{-- <span>Price: <a class="price"> {{ $item->price }} </a></span> --}}
                                <div class="col_half">
                                    </i>£<a class="price">{{ $item->price }} </a>
                                </div>
                                <div class="col_half col_last text-right"><a class="time">{{ str_limit($item->created_at, $limit = 10,$end = NULL) }}</a></div>

                            </div>
                        </article>

                        @endforeach
                        

                    

                    </div><!-- #portfolio end -->

                    <!-- Portfolio Script
                    ============================================= -->
                    <script type="text/javascript">

                        jQuery(window).load(function(){

                            var $container = $('#portfolio');

                            $container.isotope({ transitionDuration: '0.65s' });

                            $('#portfolio-filter a').click(function(){
                                $('#portfolio-filter li').removeClass('activeFilter');
                                $(this).parent('li').addClass('activeFilter');
                                var selector = $(this).attr('data-filter');
                                $container.isotope({ filter: selector });
                                return false;
                            });

                            $('#portfolio-shuffle').click(function(){
                                $container.isotope('updateSortData').isotope({
                                    sortBy: 'random'
                                });
                            });

                            $container.isotope({
                                getSortData: {
                                    price: '.price parseInt',
                                    time: '.time'
                                }
                            });

                            $('#time-sort').click(function(){
                                $container.isotope('updateSortData').isotope({
                                    sortBy: 'time',
                                    sortAscending: false
                                });
                            });

                            $('#price-sort-asc').click(function(){
                                $container.isotope('updateSortData').isotope({
                                    sortBy: 'price',
                                    sortAscending: true // small to large

                                });
                            });

                            $('#price-sort-dsc').click(function(){
                                $container.isotope('updateSortData').isotope({
                                    sortBy: 'price',
                                    sortAscending: false // large to small
                                });
                            });                            

                            $(window).resize(function() {
                                $container.isotope('layout');
                            });

                        });

                    </script><!-- Portfolio Script End -->

                </div>

            </div>

  <div class="text-center">  {{ $items->links() }}   </div>

        </section><!-- #content end -->

@stop