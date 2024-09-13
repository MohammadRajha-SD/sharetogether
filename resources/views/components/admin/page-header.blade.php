@props(['name1', 'name2'])
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ucwords($name1)}}</h4><span class="text-muted mt-1 tx-13 mr-2 ml-1 mb-0">/{{ucwords($name2)}}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
