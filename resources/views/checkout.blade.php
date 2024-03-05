<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>كيفية دمج بوابة الدفع Stripe مع Laravel 10</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
@yield('checkout')

<body>
    <div class="container">
        <div class='row'>
            <div class='col-md-12'>
                <div class="card">
                    <div class="card-header text-end">
                        <h1>كيفية دمج بوابة الدفع Stripe مع Laravel 10</h1>
                    </div>
                    <div class="card-body">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%" class="text-end">المنتج</th>
                                    <th style="width:10%" class="text-end">السعر</th>
                                    <th style="width:8%" class="text-end">الكمية</th>
                                    <th style="width:22%" class="text-center">المجموع الفرعي</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-th="المنتج" class="text-end">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">لابتوب إيسوس فيفوبوك 17 بمعالج إنتل كور الجيل العاشر</h4>
                                            </div>
                                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('img') }}/1.png" width="100" height="100" class="img-responsive"/></div>
                                        </div>
                                    </td>
                                    <td data-th="السعر" class="text-end">$6</td>
                                    <td data-th="الكمية" class="text-end">
                                        <input type="number" value="1" class="form-control quantity cart_update" min="1" />
                                    </td>
                                    <td data-th="المجموع الفرعي" class="text-center">$6</td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> حذف</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td data-th="المنتج" class="text-end">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">لابتوب إيسوس فيفوبوك الجيل العاشر</h4>
                                            </div>
                                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('img') }}/1.png" width="100" height="100" class="img-responsive"/></div>
                                        </div>
                                    </td>
                                    <td data-th="السعر" class="text-end">$6</td>
                                    <td data-th="الكمية" class="text-end">
                                        <input type="number" value="1" class="form-control quantity cart_update" min="1" />
                                    </td>
                                    <td data-th="المجموع الفرعي" class="text-center">$6</td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> حذف</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td data-th="المنتج" class="text-end">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">لابتوب إيسوس فيفوبوك الجيل العاشر</h4>
                                            </div>
                                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('img') }}/1.png" width="100" height="100" class="img-responsive"/></div>
                                        </div>
                                    </td>
                                    <td data-th="السعر" class="text-end">$6</td>
                                    <td data-th="الكمية" class="text-end">
                                        <input type="number" value="1" class="form-control quantity cart_update" min="1" />
                                    </td>
                                    <td data-th="المجموع الفرعي" class="text-center">$6</td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> حذف</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align:right;"><h3><strong>المجموع $6</strong></h3></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align:right;">
                                        <form action="/session" method="POST">
                                            <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> متابعة التسوق</a>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type='hidden' name="total" value="6">
                                            <input type='hidden' name="productname" value="لابتوب إيسوس فيفوبوك 17 بمعالج إنتل كور الجيل العاشر">
                                            <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> الدفع</button>
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
