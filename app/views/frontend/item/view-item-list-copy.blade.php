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

                  <!-- Portfolio Filter
                    ============================================= -->
                    <ul id="portfolio-filter" class="clearfix">

                        {{-- <li class="activeFilter"><a href="#" data-filter="*">Show All</a></li> --}}
                        @foreach ($parentCategory as $category)
                        <button><a class="filter" data-filter={{".".$category->id }}>{{ $category->name }}</a></button>
                        @endforeach

                    </ul><!-- #portfolio-filter end -->


                    <ul id="portfolio-filter-right" class="clearfix">
                        {{-- <li class="activeFilter" id="time-sort"><a href="#" data-sort="*">默认时间</a></li>   --}}
                        <li class="sort" data-sort="price:desc">价格最低</li>
                        <li class="sort" data-sort="price:asc">价格最高</li>                
                    </ul>  


                    <div class="clear"></div>





                    <!-- Portfolio Items
                    ============================================= -->
                    <div id="portfolio-mix " class="portfolio-nomargin clearfix">

                        @foreach($items as $item)                 

                        <article 
                        id="portfolio-item-1" 
                        data-loader="include/ajax/portfolio-ajax-image.php" 
                        class="<?php echo "mix ".($trigger?$item->parent_category_id:$item->category_id)." portfolio-item"; ?>" 
                        data-price ="{{ $item->price }}"
                        data-time ="{{ str_limit($item->created_at, $limit = 10,$end = NULL) }}"
                            >
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
                               
                                <div class="col_half">
                                    <a class=" button button-3d button-mini button-rounded "><i>£</i><i class="price">{{ $item->price }}</i></a>
                                    
                                </div>
                                <div class="col_half col_last text-right">
                                    <a class="time">{{ str_limit($item->created_at, $limit = 10,$end = NULL) }}</a></div>

                            </div>
                        </article>

                        @endforeach
                        

                    </div><!-- #portfolio end -->



                </div>

                 <div class="text-center">  {{ $items->links() }}   </div>


            </div>

 

        </section><!-- #content end -->


<!-- Portfolio Script
============================================= -->
<script type="text/javascript">

   

        $(function(){
            $('#portfolio-mix').mixItUp();  
        });




</script><!-- Portfolio Script End -->

@stop