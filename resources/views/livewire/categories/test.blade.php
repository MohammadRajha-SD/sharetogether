<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .category-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .category-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row category-group">
        <div class="col-3">
            <div class="category-title">Mobile phone</div>
        </div>
        <div class="col-9">
            All mobile phones | 5G mobile phone | Gaming Phone | Camera Phone | Full screen mobile phone | Elderly phone
        </div>
    </div>

    <div class="row category-group">
        <div class="col-3">
            <div class="category-title">Mobile phone storage</div>
        </div>
        <div class="col-9">
            32GB | 64GB | 128GB | 256GB | 512GB
        </div>
    </div>

    <div class="row category-group">
        <div class="col-3">
            <div class="category-title">Mobile phone recommendation</div>
        </div>
        <div class="col-9">
            Face Recognition | Fast charging | Screen fingerprint | Wireless charging | Rugged Phone | Long battery life | Ultra-high screen-to-body ratio | NFC
        </div>
    </div>

    <div class="row category-group">
        <div class="col-3">
            <div class="category-title">Mobile phone accessories</div>
        </div>
        <div class="col-9">
            Phone Case/Protective Cover | Mobile phone film | Data cable | charger | Mobile Phone Headset | Fashionable toys | Mobile phone batteries | Apple peripherals | Power Bank | Qi wireless charging | Bluetooth Headset | Mobile phone holder | Photo accessories | Mobile phone memory card | Gamepad | Car Accessories
        </div>
    </div>

    <div class="row category-group">
        <div class="col-3">
            <div class="category-title">Photography and videography</div>
        </div>
        <div class="col-9">
            digital camera | Mirrorless camera | SLR camera | Polaroid | Action Camera | Camera | Lenses | Studio Equipment | Outdoor equipment | Digital Photo Frame
        </div>
    </div>

    <div class="row category-group">
        <div class="col-3">
            <div class="category-title">Digital Accessories</div>
        </div>
        <div class="col-9">
            Handheld Stabilizer | Memory Card | Tripod/Pan Head | Camera Bags | Filters | Flash/handle | Battery/Charger | Body accessories | Card reader | Camera cleaning/film | Lens accessories | Digital Stand
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@foreach($category['subcategories'] as $sub)
    <h6 class="m-3">{{$sub['name']}}</h6>

    @if(isset($sub) && is_array($sub) && array_key_exists('subcategories', $sub) && !empty($sub['subcategories']))
        @foreach($sub['subcategories'] as $child)
            <div class="row ">
                <div class="col-2">
                    <div class="border-right-2" style="border-right:2px solid #eee">
                        {{$child['name']}}
                    </div>
                </div>
                <div class="col-10">
                    <div class="d-flex">
                        @if(isset($child) && is_array($child) && array_key_exists('subcategories', $child) && !empty($child['subcategories']))
                            @foreach($child['subcategories'] as $subchild)

                                <p>{{$subchild['name']}}</p>
                                @if(!$loop->last)
                                    <b>></b>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endforeach
