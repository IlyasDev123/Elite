@extends('layouts.app')
@section('content')
    <div class="site__container">
        <div class="main__content">
            <h1 class="text__center">What Would You Like To Order?</h1>

            <ul class="main__link">
                <li>
                    <a href="">
                        <span class="large-text">Custom Patch</span>
                        <span class="sub-text">Woven labels/Accessories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('orders.create') }}">
                        <span class="large-text">Digitizing/Vector</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="large-text">Custom Clothing</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="large-text">Blank Apparels</span>
                    </a>
                </li>
            </ul>

            <div class="image__with-form">
                <div class="img__block">
                    <img src="https://www.elitepunching.com/images/inspiring.jpg" alt="">
                </div>
                <div class="content__block">
                    <span class="site__btn">Order A New Patch</span>

                    <form action="">
                        <div class="form__field">
                            <input type="text" placeholder="Name">
                        </div>
                        <div class="form__field">
                            <input type="text" placeholder="Name">
                        </div>
                        <div class="form__field">
                            <input type="text" placeholder="Name">
                        </div>

                        <button class="form__submit" type="submit">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
