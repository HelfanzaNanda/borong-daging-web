@extends('layouts.main')

@section('title', 'Faq')

@section('content')
    <div class="gambo-Breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Faq</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="all-product-grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="mt-4 default-title">
                        <h2>Frequently Asked Questions</h2>
                        <img src="images/line.svg" alt="">
                    </div>
                    <div class="pt-1 panel-group accordion" id="accordion0">
                        @foreach ($faqCategories as $key => $category)
                            <div class="panel panel-default">
                                <div class="panel-heading" id="heading{{ $key }}">
                                    <div class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-target="#collapse{{ $key }}" href="#"
                                            aria-expanded="false" aria-controls="collapse{{ $key }}">
                                            {{ $category->name }}
                                        </a>
                                    </div>
                                </div>
                                <div id="collapse{{ $key }}" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="heading{{ $key }}" data-parent="#accordion0" style="">
                                    <div class="panel-body">
                                        @foreach ($category->faqs as $faq)
                                        <table class="table table-light">
                                            <tbody>
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <ul>
                                                            <li><strong>Question</strong></li>
                                                            <li><p>{{ $faq->question }}</p></li>
                                                            <li><strong>Answeer</strong></li>
                                                            <li><p>{{ $faq->answer }}</p></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <div class="panel panel-default">
    <div class="panel-heading" id="headingTwo">
        <div class="panel-title">
            <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" href="#"
                aria-expanded="false" aria-controls="collapseTwo">
                Account Related
            </a>
        </div>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
        aria-labelledby="headingTwo" data-parent="#accordion0">
        <div class="panel-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam semper faucibus erat
                a efficitur. Praesent vulputate mauris eget augue semper, at eleifend enim aliquam.
                Vivamus suscipit lacinia neque eget suscipit. Morbi vitae nisl ac justo placerat
                vulputate ac quis lectus. Vestibulum pellentesque, orci eu ultrices molestie, nisi
                libero hendrerit eros, vel interdum augue tortor vel urna. Nullam enim dolor,
                pulvinar in metus vitae, tincidunt dignissim neque. Pellentesque tempor nulla eu
                neque hendrerit fringilla. Suspendisse ultricies venenatis maximus. Suspendisse erat
                elit, ultricies eu porta nec, luctus sit amet dui. Fusce feugiat odio semper,
                hendrerit lectus vitae, convallis nisl. Ut a justo diam. Donec vitae leo lorem. Cras
                pharetra libero ut urna condimentum, non imperdiet leo posuere.</p>
        </div>
    </div>
</div> --}}
