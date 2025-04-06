<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ URL::route("/") }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime(today())) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>{{ URL::route("contactus") }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime(today())) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>



    <url>
        <loc>{{ URL::route("blog") }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime(today())) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>{{ URL::route("events") }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime(today())) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@foreach($blogs as $blog)
    <url>
        <loc>{{ URL::route("blog.detail", ['url'=>$blog->url]) }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime($blog->post_date)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endforeach


@foreach($events as $event)
    <url>
        <loc>{{ URL::route("event.detail", ['id'=>$event->id]) }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime($event->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endforeach

@foreach($destinations as $destination)
    <url>
        <loc>{{ URL::route("destination", ['url'=>'destination']) }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime($destination->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endforeach

@foreach($destination_packages as $destination_package)
    <url>
        <loc>{{ URL::route("package.destination", ['url'=>$destination_package->url]) }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime($destination_package->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endforeach

@foreach($packages_categories as $packages_category)
    <url>
        <loc>{{ URL::route("package.category", ['url'=>$packages_category->url]) }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime($packages_category->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endforeach



@foreach($packages as $pacakge)
    <url>
        <loc>{{ URL::route("package.detail", ['url'=>$pacakge->url]) }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime($pacakge->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endforeach


@foreach($packages as $book)
    <url>
        <loc>{{ URL::route("booknow", ['id'=>$book->id]) }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime($book->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endforeach
</urlset>