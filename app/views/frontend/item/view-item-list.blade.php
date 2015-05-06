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
        <h3>
            @if ($location_name == 'suzhou')
             苏州地区
            @elseif ($location_name == 'liverpool')
            利物浦地区
            @endif
        </h3>
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

{{--                     <div id="portfolio-ajax-loader"><img src="images/preloader-dark.gif" alt="Preloader"></div> --}}

                   <!-- Portfolio Filter
                    ============================================= -->
                    <ul id="portfolio-filter" class="clearfix">

                        <li class="<?php $categoryId == 0?$active = "activeFilter":$active = ""; echo $active; ?>"><a href="{{ route('item/list', array('location_name' => $location_name ,'category_id'=> 0, 'sort_id' => $sortId )) }}" data-filter="*">全部</a></li>
                        @foreach ($parentCategory as $category)
                        <li class="<?php $categoryId == $category->id?$active = "activeFilter":$active = ""; echo $active; ?>">
                            <a href="{{ route('item/list', array('location_name' => $location_name ,'category_id'=> $category->id, 'sort_id' => $sortId )) }}" data-filter={{".".$category->id }}>{{ $category->name }}</a></li>
                        @endforeach

                    </ul><!-- #portfolio-filter end -->


                    <ul id="portfolio-filter-right" class="clearfix">
                        <li class="<?php if($sortId == 0) echo "activeFilter";?>" id="time-sort"><a href="{{ route('item/list', array('location_name' => $location_name ,'category_id'=> $categoryId, 'sort_id' => 0 )) }}" data-filter="*">最近</a></li>  
                        <li class="<?php if($sortId == 1) echo "activeFilter";?>" id="time-sort"><a href="{{ route('item/list', array('location_name' => $location_name ,'category_id'=> $categoryId, 'sort_id' => 1 )) }}" data-filter="*">最早</a></li>  
                        <li class="<?php if($sortId == 2) echo "activeFilter";?>" id="price-sort-asc"><a href="{{ route('item/list', array('location_name' => $location_name ,'category_id'=> $categoryId, 'sort_id' => 2 )) }}" data-filter=".2">价格最高</a></li>
                        <li class="<?php if($sortId == 3) echo "activeFilter";?>" id="price-sort-dsc"><a href="{{ route('item/list', array('location_name' => $location_name ,'category_id'=> $categoryId, 'sort_id' => 3 )) }}" data-filter=".2">价格最低</a></li>                
                    </ul>  


                    <div class="clear"></div>

                    <!-- Portfolio Items
                    ============================================= -->
                    <div id="portfolio" class="portfolio-nomargin portfolio-ajax clearfix">

                        @foreach($items as $item)                 

                        <article id="portfolio-item-1" data-loader="include/ajax/portfolio-ajax-image.php" class="portfolio-item" >
                            <div class="portfolio-image">
                                <a href={{ asset("assets/new_img/$item->picture_name")}}>
                                    <img src={{ asset("assets/new_img/$item->picture_name")}} alt="Open Imagination">
                                </a>

                                <div class="portfolio-overlay  ">
                                    <a href={{ asset("assets/new_img/$item->picture_name")}} class="left-icon" data-lightbox="image"><i class="icon-camera"></i></a>
                                    <a href="{{ route('singleItem', $item->id) }}"  class="right-icon"><i class="icon-external-link"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-desc">
                                <h3><a href="{{ route('singleItem', $item->id) }}">{{ str_limit($item->title, $limit = 19,$end = "...")}}</a></h3>
                               
                                <div class="col_half">
                                    @if($item->location == 1)
                                        <a class=" button button-3d button-mini button-rounded "><i>£</i><i class="price">{{ $item->price }}</i></a>
                                    @elseif($item->location == 2)
                                        <a class=" button button-3d button-mini button-rounded "><i>￥</i><i class="price">{{ $item->price }}</i></a>
                                    @endif
                                </div>
                                <div class="col_half col_last text-right">
                                    <a class="time">{{ str_limit($item->created_at, $limit = 10,$end = NULL) }}</a></div>

                            </div>
                        </article>

                        @endforeach
                        

                    </div><!-- #portfolio end -->



                 



                </div>

                 {{-- <div class="text-center">  {{ $links }}   </div> --}}
                 <div class="text-center">  {{ $items->links() }}   </div>


            </div>

 

        </section><!-- #content end -->


<!-- Portfolio Script
============================================= -->
<script type="text/javascript">

    // jQuery(window).load(function(){
    //    // jQuery(document).ready(function($) {

       

    //     initIsotope();

        

    // });

    // function initIsotope(){

    //         var $container = $('#portfolio');

    //         $container.isotope({ transitionDuration: '0.65s' });

    //         $('#portfolio-filter a').click(function(){
    //             $('#portfolio-filter li').removeClass('activeFilter');
    //             $(this).parent('li').addClass('activeFilter');
    //             var selector = $(this).attr('data-filter');
    //             $container.isotope({ filter: selector });
    //             return false;
    //         });

    //         $('#portfolio-shuffle').click(function(){
    //             $container.isotope('updateSortData').isotope({
    //                 sortBy: 'random'
    //             });
    //         });

    //         $container.isotope({
    //             getSortData: {
    //                 price: '.price parseInt',
    //                 time: '.time'
    //             }
    //         });

    //         $('#time-sort').click(function(){
    //             $container.isotope('updateSortData').isotope({
    //                 sortBy: 'time',
    //                 sortAscending: false
    //             });
    //         });

    //         $('#price-sort-asc').click(function(){
    //             $container.isotope('updateSortData').isotope({
    //                 sortBy: 'price',
    //                 sortAscending: true // small to large

    //             });
    //         });

    //         $('#price-sort-dsc').click(function(){
    //             $container.isotope('updateSortData').isotope({
    //                 sortBy: 'price',
    //                 sortAscending: false // large to small
    //             });
    //         });                            

    //         $(window).resize(function() {
    //             $container.isotope('layout');
    //         });

    //     }








</script><!-- Portfolio Script End -->



@stop