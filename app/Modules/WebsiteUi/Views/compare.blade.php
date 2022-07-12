@extends('website.layouts.master')

@section('content')

<section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-xs-30">
          <div class="cart-item-table commun-table">
            <div class="table-responsive">
              <table class="compare-info">
                <tbody>
                  <tr>
                    <td></td>
                    <td class="image">
                      <a href="product-detail.html"></a>
                      <img src="/website/assets/images/product/product_1_md.jpg" alt="Stylexpo" title="" class="img-thumbnail" />
                    </td>
                    <td class="image">
                      <a href="product-detail.html"></a>
                      <img src="/website/assets/images/product/product_2_md.jpg" alt="Stylexpo" title="" class="img-thumbnail" />
                    </td>
                  </tr>
                  <tr>
                      <td>{{__("Prix")}}</td>
                      <td class="name">
                        <a href="product-detail.html">$80.00</a>
                      </td>
                      <td class="name">
                        <a href="product-detail.html">$80.00</a>
                      </td>
                  </tr>
                  <tr>
                      <td>{{__("Modèle")}}</td>
                      <td>Product 2</td>
                      <td>Product 5</td>
                  </tr>
                  <tr>
                      <td>{{__("Marque")}}</td>
                      <td>Lorem ipsum dolor sit amet,</td>
                      <td>Lorem ipsum dolor sit amet,</td>
                  </tr>
                  <tr>
                      <td>{{__("Disponibilité")}}</td>
                      <td class="out_stock availability">Out Of Stock</td>
                      <td class="in_stock availability">In Stock</td>
                  </tr>
                  <tr>
                    <td>{{__("Évaluation")}}</td>
                    <td class="rating">
                      <div class="rating-summary-block">
                        <div title="53%" class="rating-result">
                          <span style="width:53%"></span>
                        </div>
                      </div>
                        Based on 2 reviews.
                    </td>
                    <td class="rating">
                      <div class="rating-summary-block">
                        <div title="53%" class="rating-result">
                          <span style="width:53%"></span>
                        </div>
                      </div>
                        Based on 2 reviews.
                    </td>
                  </tr>
                  <tr>
                      <td>{{__("Résumé")}}</td>
                      <td class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elementum lacinia justo convallis ornare.</td>
                      <td class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elementum lacinia justo convallis ornare.</td>
                  </tr>
                  <tr>
                      <td>{{__("Poids")}}</td>
                      <td>0.00kg</td>
                      <td>0.00kg</td>
                  </tr>
                  <tr>
                      <td>{{__("Dimensions (L x W x H)")}}</td>
                      <td>0.00cm x 0.00cm x 0.00cm</td>
                      <td>0.00mm x 0.00mm x 0.00mm</td>
                  </tr>
                </tbody>
                <tr>
                  <td></td>
                  <td>
                    <button type="button" class="btn btn-black"><i class="fa fa-shopping-cart"></i>{{__("Ajouter au panier")}}</button>
                    <button class="btn btn-color" type="button" title="Supprimer">{{__("Supprimer")}}</button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-black"><i class="fa fa-shopping-cart"></i>{{__("Ajouter au panier")}}</button>
                    <button class="btn btn-color" type="button" title="Supprimer">{{__("Supprimer")}}</button>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
