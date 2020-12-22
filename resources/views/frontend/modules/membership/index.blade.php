@extends('frontend.layouts.layout')
@section('content')
    <section class="showcase-short">
        <div class="overlay"></div>
    </section>

    <section class="membership-body">
        <div class="wrapper">
            <div class="heading">
                <p class="small">MEMBERSHIP</p>
                <h5 class="large">Members</h5>
            </div>
            <div class="members-grid">
                @if($members)
                    @foreach($members as $member)

                        <div class="each-member">
                            <div class="img">
                                @if(isset($member->files[0]))
                                    <img src="{{$member->files[0]->path.'/'.$member->files[0]->name}}">
                                @endif
                            </div>
                            <div class="context">
                                <div class="blurred"></div>
                                <div class="text">
                                    <div class="fx">
                                        <h6 class="name">{{(count($member->availableLanguage) > 0) ?  $member->availableLanguage[0]->title : ''}}</h6>
                                        <a class="story btn-view" href="#">Full Story</a>
                                    </div>
                                    <span class="body-text"
                                       hidden>
                                        {!!(count($member->availableLanguage) > 0) ? $member->availableLanguage[0]->body : ''!!}</span>
                                    <p class="para">{{(count($member->availableLanguage) > 0) ?  $member->availableLanguage[0]->description : ''}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif

            </div>
        </div>
    </section>
    <div class="mask"></div>
    <div id="quick-view-pop-up">
        <div class="quick-view-panel">
            <div class="quick-view-close"></div>
            <div class="quick-view-loading">
                Quick View Loading...
            </div>

            <div class="content">
                <div class="img">
                    <img src="/frontend-assets/gsbc/img/projects/1.png">
                </div>
                <div class="text">
                    <h2 class="name">opkpo</h2>
                    <span class="">    </span>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('.btn-view').on('click', function (e) {
            setPanel(e);
        });
        function setPanel(e) {
            let button = e.target;
            let title = button.previousElementSibling.textContent;
            let text = e.target.parentElement.nextElementSibling.textContent;
            let quickPanel = document.querySelector('.quick-view-panel');
            let content = quickPanel.querySelector('.content');
            let contentChild=content.children;

            let contextDiv=e.target.parentElement.parentElement.parentElement;
            let src=contextDiv.previousElementSibling.firstElementChild.src;

            let img=contentChild[0];
            img.firstElementChild.src=src;
            let textContent = contentChild[1];

            textContent.children[0].textContent = title;

            console.log(textContent.children[1]);
            textContent.children[1].textContent=text;
        }
    </script>
@endsection
