@extends('layouts.app')
@section('breadcrumb')
    <?php
        $headlines = App\Headline::all();
        $count = 0;
    ?>
    <div id="carouselContent" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            @foreach($headlines as $headline)
                <div class="carousel-item {{$count == 0 ? 'active' : ''}} text-center p-4">
                    <a href="{{$headline->link}}" target="_blank" style="text-decoration: none; color:white; font-size:15px">{{$headline->title}}</a>
                </div>
                <?php $count++ ?>
            @endforeach
        </div>
    </div>
@endsection
@section('content')
@include('layouts.messages')

<div class="container section-margin pt-3 pb-5">
    <a href="/" style="font-size:20px"><i class="fas fa-arrow-left"></i> Bumalik sa Search</a><br><br>
    <h1 style="color: #2980b9;">Agrikultura</h1>
    <span>
        Isa ang agrikultura sa pinakamalaking industriya at pinagkukunan ng kabuhayan sa bansa. Nabibilang dito ang mga sektor ng paghahalaman (crops) at paghahayupan (livestock). 
        <br><br>
        Kaugnay dito, binuo ng PCAARRD ang Industry Strategic S&T Programs o ISPs upang makapagbigay ng mga solusyong naka-base sa agham at teknolohiya para sa mga pangangailangan ng AANR. Nakabase ito sa iba’t ibang mga kalakal o commodity sa bansa. Ilang halimbawa ng ISPs sa ilalim ng paghahalaman ay mga programa at proyekto para sa abaka, kakaw, kape, at mangga. Para naman sa paghahayupan, mayroong mga ISP para sa gatas o dairy, itik, kambing, baboy, atbp. 
    </span>
    <br><br>
    <h4 style="font-weight:900">
        Kilalanin ang industriya ng agrikultura
    </h4>
    <span>
        Dito sa aanr.ph, gusto nating malaman kung ano ba ang pinakabagong usapin sa AANR. Kasalukyan, ito ang mga kaalaman sa Agrikultura na maari ninyong makita dito.
    </span>
    <br><br>    
    <h5 style="font-weight:900">
        Distribusyon ng Nilalaman kada Sektor
    </h5>
    <span>
        Ipinapakita ng graph na ito ang bilang at distribusyon ng mga uri ng nilalaman para sa bawat sektor. Sa kasalukuyan, ang mga uri ng nilalaman o knowledge assets ay pinakamarami sa ilalim ng balita at teknolohiya, kung saan paghahalaman ang sektor na may pinakamaraming nilalaman.
    </span>
    <br><br>
    <div class="w-100 text-center">
        <img src="/storage/page_images/graph1.png" alt="">
    </div>
    <br><br>    
    <h5 style="font-weight:900">
        Mga Tagapag-ambag ng Kaalaman
    </h5>
    <span>
        Ipinapakita sa graph na ito kung aling mga institusyon at/o indibidwal ang nakapaglimbag ng pinakamaraming knowledge assets base sa nakalap na datos. Sa kasalukuyan, ang mga institusyon na mga pinakamaraming ambag na knowledge assets sa portal ay ang PCAARRD at UPLB.
    </span>
    <br><br>
    <div class="w-100 text-center">
        <img src="/storage/page_images/graph2.png" alt="">
    </div>
    <br><br>    
    <h5 style="font-weight:900">
        Mga Kontribusyon sa Pagdaan ng Panahon kada Sektor
    </h5>
    <span>
        Ipinapakita ng graph na ito ang kontirbusyon sa knowledge assets ng mga sektor sa pagdaan ng mga taon. Sa kasalukuyan, naitala ang pinakamaraming kontribusyong nailathala sa 2016, mula sa sektor ng tubig tabang. Mapapansin rin natin na kakaunti ang mga knowledge assets sa ilalim ng yamang tubig.
    </span>
    <br><br>
    <div class="w-100 text-center">
        <img src="/storage/page_images/graph3.png" alt="">
    </div>
    <br><br>
</div>


@endsection