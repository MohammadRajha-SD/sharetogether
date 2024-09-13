@props(['category'])
<a href="/?category={{ $category->slug }}"
   class="btn btn-outline-primary btn-sm text-uppercase font-weight-bold"
   style="font-size: 10px;">{{ $category->name }}</a>
