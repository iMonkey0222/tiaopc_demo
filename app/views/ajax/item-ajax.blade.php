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
                                    <a class=" button button-3d button-mini button-rounded "><i>£</i><i class="price">{{ $item->price }}</i></a>
                                    {{-- </i>£<a class="price">{{ $item->price }} </a> --}}
                                </div>
                                <div class="col_half col_last text-right">
                                    <a class="time">{{ str_limit($item->created_at, $limit = 10,$end = NULL) }}</a></div>

                            </div>
                        </article>

                        @endforeach