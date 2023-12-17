<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Footer Octave_SRM</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>
    @component('components.footer')
    @parent
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="footer-col">
        <h4>{{ partial.footer }}</h4>
        <ul>
          <li><a href="{{('about-us') }}">about us</a></li>
          <li><a href="{{('our-services') }}">our services</a></li>
          <li><a href="{{('privacy-policy') }}">privacy policy</a></li>
          <li><a href="{{('octave-allegro') }}">octave allegro</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>get person</h4>
        <ul>
          <li><a href="{{('faq') }}">FAQ</a></li>
          <li><a href="{{('shipping') }}">shipping</a></li>
          <li><a href="{{('returns') }}">returns</a></li>
          <li><a href="{{('order-status') }}">order status</a></li>
          <li><a href="{{('aldous-epik') }}">Aldous epik</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>online shop Mobile Legends</h4>
        <ul>
          <li><a href="{{('diamond') }}">Diamond</a></li>
          <li><a href="{{('money') }}">Money</a></li>
          <li><a href="{{('lucky') }}">Lucky</a></li>
          <li><a href="{{('unlucky') }}">Unlucky</a></li>
        </ul>
      </div>
      </div>
    </div>
  </div>
</footer>
    @endcomponent
  </body>
</html>