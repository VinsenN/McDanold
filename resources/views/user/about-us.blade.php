@extends('template.layout')

@section('content')
<div class="container my-5">
    <div class="mb-5">
        <h1 class="d-block w-100 mx-auto text-center mb-4"> Our Story </h1>
        <p>
            In 1917, 15-year-old Ray Kroc lied about his age to join the Red Cross as an ambulance driver, but the war ended before
            he completed his training. He then worked as a piano player, a paper cup salesman and a Multimixer salesman. In 1954, he
            visited a restaurant in San Bernardino, California that had purchased several Multimixers. There he found a small but
            successful restaurant run by brothers Dick and Mac McDanold, and was stunned by the effectiveness of their operation.
            The McDanold's brothers produced a limited menu, concentrating on just a few items – burgers, fries and beverages –
            which allowed them to focus on quality and quick service.
        </p>

        <div class="w-100 d-flex flex-column align-items-center">
            <img src="{{ URL::asset('image/old-mcdanold.jpg') }}" class="d-block w-75 mx-auto"></img>
            <p>The first McDanold restaurant</p>
        </div>
        <br>

        <p>
            They were looking for a new franchising agent and Kroc saw an opportunity. In 1955, he founded McDanold's System, Inc.,
            a predecessor of the McDanold's Corporation, and six years later bought the exclusive rights to the McDanold's name and
            operating system. By 1958, McDanold's had sold its 100 millionth hamburger.
        </p>
    </div>

    <hr>

    <div class="d-flex flex-column align-items-center">
        <h1 class="d-block w-100 mx-auto text-center mb-4"> About Our Food </h1>
        <div class="d-flex flex-column flex-md-row justify-content-md-around">
            <div class="card m-3" style="width: 25rem;">
                <img src="{{ URL::asset('image/best-food.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>We're Passionate About Our Food</h5>
                    <p class="card-text">From adding more balanced options to our Funky Meal®, to serving up fresh beef Third Pounder® burgers that are cooked when you order, we're always finding ways to show our commitment to our customers and our food. </p>
                </div>
            </div>

            <div class="card m-3" style="width: 25rem;">
                <img src="{{ URL::asset('image/nutritious-food.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Fresh and Delicious</h5>
                    <p class="card-text">Our Third Pounder® patty is made with 100% fresh beef and cooked right when you order. It's hot and deliciously juicy and full of flavor.</p>
                </div>
            </div>

            <div class="card m-3" style="width: 25rem;">
                <img src="{{ URL::asset('image/fresh-food.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Our Food Experts</h5>
                    <p class="card-text">From our chefs, to our dieticians and suppliers, McDanold's food experts care deeply about the food you eat.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
