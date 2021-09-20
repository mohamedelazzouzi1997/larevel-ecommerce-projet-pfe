@extends('shop')
@section('title')
    <title>CheckOut</title>
@endsection
@section('content')
<div class="container">
    <div class="py-5 text-center">
        <div class="py-5 text-center">
            <i class="fas fa-4x fa-shipping-fast"></i>


            <h2>your delivery adress</h2>

        </div>
    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class=" text-primary">Your cart</span>
          <span class="text-white badge badge-primary badge-pill">{{ $contents->count()}}</span>
        </h4>
        <ul class="list-group mb-3">
            @foreach ($contents as $produit)

            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <a href="{{ route('show_produit',["id" =>$produit->id]) }}"><img width="110" class="rounded-circle img-thumbnail" src="{{ asset('img\/'.$produit->attributes->img) }}" alt=""></a>

                <div>
                  <h6 class="my-0" style="font-size: 140%; font-weight:bolder">{{$produit->name }}</h6>
                  <small class="text-black "><span style="font-size: 120%; font-weight:bolder">Size :</span> {{strToUpper($produit->attributes->size)}}</small> <div class="space"></div>
                  <small class="text-black"><span style=" font-size: 120%; font-weight:bolder">Color :</span> {{strToUpper($produit->attributes->color)}}</small><div class="space"></div>
                  <small class="text-black"><span style="font-size: 120%; font-weight:bolder">Quantity :</span> {{strToUpper($produit->quantity)}}</small>
                  {{-- <span><a style="height: 30px; margin-left:37px" class="btn btn-primary btn-sm" href="#" role="button">Edit</a></span> --}}
                </div>

                <span class="text-muted"> {{number_format($produit->attributes->prix_ttc * $produit->quantity,2)}}</span>

              </li>

            @endforeach


          <li class="list-group-item d-flex justify-content-between">
            <span style="font-size: 120%; font-weight:bolder">Total (Euro)</span>
            <strong>{{number_format($total_ttc_panier,2) }} €</strong>
          </li>
        </ul>

        {{-- <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">Redeem</button>
            </div>
          </div>
        </form> --}}
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3 text-primary">Billing address</h4>
        <form action="{{route('make.payment')}}" class="needs-validation" novalidate method="POST">
          @csrf
          @method('POST')
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input name="first_name" type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input name="last_name" type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="username">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input name="username" type="text" class="form-control" id="username" placeholder="Username" required>
              <div class="invalid-feedback" style="width: 100%;">
                Your username is required.
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="address">Address</label>
            <input name="address1" type="text" class="form-control" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country">Country</label>
              <select name="country" class="custom-select d-block w-100" id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
                <option>United States</option>
                <option>United States</option>
                <option>United States</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
              <select name="state" class="custom-select d-block w-100" id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
                <option>California</option>
                <option>California</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Zip</label>
              <input name="zip" type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout {{ number_format($total_ttc_panier,2)}} € With PayPal</button>
        </form>
      </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2017-2018 Company Name </p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>

                </form>
            </div>

        </div>

</main>
<br> --}}
<script>


<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
</script>
@endsection
