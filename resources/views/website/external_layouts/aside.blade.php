<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light py-3 topdisk navbar-shrink" id="mainNav">
    <div class="container px-4 px-lg-5">
        <div class="mobile">
            <a class="navbar-brand fixed-top logo" href="#first"><img class="img-fluid" src="{{asset('assets/website/img/logo2.png')}}" alt="{{$logoTitle['ar']}}"></a>
            <button class="navbar-toggler navbar-toggler-right fixed-top" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        </div>
        <div class="collapse navbar-collapse fixed-top" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link cat1" href="{{route('website.home').'#first'}}">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link cat2 @if(request()->route()->getName() == 'website.services') active @endif" href="{{route('website.home').'#sec'}}">خدماتنا</a></li>
                <li class="nav-item"><a class="nav-link cat3" href="{{route('website.home').'#th'}}">عملائنا</a></li>
                <li class="nav-item"><a class="nav-link cat4" href="{{route('website.home').'#fu'}}">طلب خدمة</a></li>
                <li class="nav-item"><a class="nav-link cat4 @if(request()->route()->getName() == 'website.staff') active @endif" href="{{route('website.home').'#fi'}}">طاقم العمل</a></li>
                <li class="nav-item"><a class="nav-link cat5 @if(request()->route()->getName() == 'articles.show') active @endif" href="{{route('website.home').'#se'}}">مدونة هاى تك</a></li>
                <li class="nav-item"><a class="nav-link cat6" href="{{route('website.home').'#sev'}}">تواصل معنا</a></li>
            </ul>
        </div>
    </div>
</nav>
