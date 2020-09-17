<h3>{{__('site.cart_total')}}</h3>
<p class="d-flex">
    <span>{{__('site.subtotal')}}</span>
    <span>{{$cart_total['sub_total']}} {{__('site.currency')}}</span>
</p>
<p class="d-flex">
    <span>{{__('site.delivery')}}</span>
    <span>{{$cart_total['delivery']}} {{__('site.currency')}}</span>
</p>
<p class="d-flex">
    <span>{{__('site.discount')}}</span>
    <span>{{$cart_total['discount']}} {{__('site.currency')}}</span>
</p>
<hr>
<p class="d-flex total-price">
    <span>{{__('site.total')}}</span>
    <span>{{$cart_total['total']}} {{__('site.currency')}}</span>
</p>
