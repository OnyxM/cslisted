<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($postings as $posting)
    <url>
        <loc>{{ URL::route("single-posting", ["id"=>$posting->id,"slug"=>$posting->slug]) }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime($posting->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endforeach

@foreach($categories as $category)
    <url>
        <loc>{{ URL::route("category", ["id"=>$category->id,"slug"=>$category->slug]) }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime($category->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endforeach

@foreach($cities as $city)
    <url>
        <loc>{{ URL::route("city", ["id"=>$city->id,"slug"=>$city->slug]) }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime($city->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endforeach
</urlset>