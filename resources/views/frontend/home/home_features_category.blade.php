@php
   $categories = App\Models\Category::orderBy('category_name','ASC')->get();
@endphp


<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
                <h3>Featured Categories</h3>

            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
        </div>
        <div class="carausel-10-columns-cover position-relative">
            <div class="carausel-10-columns" id="carausel-10-columns">

                @foreach ($categories as $item)
                <div class="card-2 bg-10 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="shop-grid-right.html"><img src="{{ asset( $item->category_image) }}" alt="" /></a>
                    </figure>
                    <h6><a href="shop-grid-right.html">{{  $item->category_name }}</a></h6>

        @php
$products = App\Models\Product::where('category_id',$item->id)->get();
        @endphp

                    <span>{{ count($products) }} items</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
