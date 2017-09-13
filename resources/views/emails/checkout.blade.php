
<body bgcolor="#f6f5f3" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased;width:100% !important;background:#f6f5f3;-webkit-text-size-adjust:none;">
<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f6f5f3" style="padding: 15px">
    <tr>
        <table width="600" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td width="600">
            <tr style="border-bottom: 1px solid #d0d4d8">
                <td><h1 style="text-align: center">Уважаемый {{$data['user']['first_name']}} {{$data['user']['last_name']}}!</h1></td>
            </tr>
            <tr>
                <td>Вы оформили заказ на сайте dev.marketplace.agroyard.com.ua в <b>{{$data['order']['created_at']}}</b></td>
            </tr>
            <tr>
                <td style="border-bottom: 2px solid #1dd659; font-weight: bold;font-size: 11pt;font-family: verdana, arial, sans-serif;white-space: nowrap;color: #515151;"><br><strong>Данные вашей покупки:</strong></td>
            </tr>
            <table style="border-bottom: 1px solid #c3c3c3;" cellspacing="0" cellpadding="5" width="600" >
                <tbody>
                <tr>
                    <td style="background: #eeeeee;font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;" width="30%"><strong>Название:</strong></td>
                    <td style="border-left: 1px solid #c3c3c3;font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;">
                        <a href="http://marketplace.test/products/{{$data['product']['slug']}}" target="_blank" rel="noopener">{{$data['product']['name']}}</a>({{$data['product']['id']}})</td>
                </tr>
                <tr>
                    <td style="border-top: 1px solid #c3c3c3;background: #eeeeee;font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;" width="30%"><strong>Цена:</strong></td>
                    <td style="border-top: 1px solid #c3c3c3;border-left: 1px solid #c3c3c3;font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;">{{$data['order']['price']}} грн.</td>
                </tr>
                <tr>
                    <td style="border-top: 1px solid #c3c3c3;background: #eeeeee;font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;" width="30%"><strong>Количество:</strong></td>
                    <td style="border-top: 1px solid #c3c3c3;border-left: 1px solid #c3c3c3;font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;">{{$data['order']['quantity']}}</td>
                </tr>
                <tr>
                    <td style="border-top: 1px solid #c3c3c3;background: #eeeeee;font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;" width="30%"><strong>Способ оплаты:</strong></td>
                    <td style="border-top: 1px solid #c3c3c3;border-left: 1px solid #c3c3c3;font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;">{{$data['order']['payment']}}</td>
                </tr>
                <tr>
                    <td style="border-top: 1px solid #c3c3c3;background: #eeeeee;font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;" width="30%"><strong>Способ доставки:</strong></td>
                    <td style="border-top: 1px solid #c3c3c3;border-left: 1px solid #c3c3c3;font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;">{{$data['order']['delivery']}}</td>
                </tr>
                <tr>
                    <td style="border-top: 1px solid #c3c3c3;background: #eeeeee;font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;" width="30%"><strong>Комментарий:</strong></td>
                    <td style="border-top: 1px solid #c3c3c3;border-left: 1px solid #c3c3c3;font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;">{{$data['order']['comment']}}</td>
                </tr>
                </tbody>
            </table>

            <tr>
                <td style="font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding: 3px;padding-top: 10px;">
                    <strong style="font-weight: bold;font-size: 11pt;font-family: verdana, arial, sans-serif;white-space: nowrap;color: #515151;"><br>Контактная информация Продавца:</strong>
                    <br><br>{{$data['merchant']['name']}}<br><strong>Телефон:</strong> {{$data['merchant']['phone']}}<br><strong>Email:</strong> {{$data['merchant']['email']}}<br><br>
                </td>
            </tr>

            <div style="max-width:600px; border-bottom: 2px solid #1dd659;width: 100%;font-weight: bold;font-size: 11pt;font-family: verdana, arial, sans-serif;white-space: nowrap;color: #515151;">Полезная информация</div>
            <table style="margin-top: 0;margin-bottom: 0;width: 600px;background: #e4e4e4;" cellspacing="0" cellpadding="0" width="600">
                <tbody><tr>
                    <td style="font-family: arial, helvetica, sans-serif;font-size: 10pt;vertical-align: top;padding-top: 10px;" width="600"><ul><li>После оформления заказа вы можете ускорить его обработку, если свяжетесь самостоятельно с продавцом</li></ul>
                    </td>
                </tr></tbody>
            </table>

            <div style="font-size: 12px;color: #555;font-weight: normal;padding-left: 8px;padding-top: 6px;width: 595px;"><strong>Внимание!</strong> Маркетплейс помогает продать или купить любой продукт, но к сожалению не может гарантировать
                безопасность сделки. Пожалуйста, будьте внимательны: старайтесь пользоваться доставкой наложенным
                платежом с минимальной предоплатой.
            </div>
            </tr>
        </table>
    </tr>
</table>
</body>
{{--ТЕМА: Поздравляем! Вы успешно оформили заказ на {{product.title}}!--}}
{{--<table width="800px">--}}
    {{--<tr style="border-bottom: 1px solid #d0d4d8">--}}
        {{--<td><h1 style="text-align: center">Уважаемый {{$data['user']['first_name']}} {{$data['user']['last_name']}}!</h1></td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td>Вы оформили заказ на сайте dev.marketplace.agroyard.com.ua в <b>{{$data['order']['created_at']}}</b></td>--}}
    {{--</tr>--}}
    {{----}}
    {{--<tbody>--}}
    {{--<tr style="border-bottom: 1px solid #d0d4d8"><td><b>Данные вашей покупки:</b></td></tr>--}}
    {{--<tr style="border-bottom: 1px solid #d0d4d8"><td>Название:<strong><a href="http://marketplace.test/products/{{$data['product']['slug']}}">{{$data['product']['name']}}</a> ( {{$data['product']['id']}} )</strong></tr>--}}
    {{--<tr style="border-bottom: 1px solid #d0d4d8"><td>Цена:<strong>{{$data['order']['price']}}</strong></td></tr>--}}
    {{--<tr style="border-bottom: 1px solid #d0d4d8"><td>Количество:<strong>{{$data['order']['quantity']}}</strong></td></tr>--}}
    {{--<tr style="border-bottom: 1px solid #d0d4d8"><td>Способ оплаты:<strong>{{$data['order']['payment']}}</strong></td></tr>--}}
    {{--<tr style="border-bottom: 1px solid #d0d4d8"><td>Способ доставки:<strong>{{$data['order']['delivery']}}</strong></td></tr>--}}
    {{--<tr style="border-bottom: 1px solid #d0d4d8"><td>Комментарий:<strong>{{$data['order']['comment']}}</strong></td></tr>--}}
    {{--</tbody>--}}


    {{--<tr></tr>--}}
    {{--<tr></tr>--}}
    {{--<tr></tr>--}}
    {{--<tr>--}}
        {{--<td><b>Контактная информация для связи с продавцом:</b></td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td><strong>{{$data['merchant']['name']}}</strong></td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td>Телефон: <strong>{{$data['merchant']['phone']}}</strong></td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td>Email: <strong>{{$data['merchant']['email']}}</strong></td>--}}
    {{--</tr>--}}

{{--<tr>--}}
    {{--<td>Полезная информация</td>--}}
{{--</tr>--}}

    {{--<tr>--}}
        {{--<td><ul><li>После оформления заказа вы можете ускорить его обработку, если свяжетесь самостоятельно с продавцом</li></ul></td>--}}
    {{--</tr>--}}
{{--<tr>--}}
    {{--<td>Внимание! Маркетплейс помогает продать или купить любой продукт, но к сожалению не может гарантировать--}}
        {{--безопасность сделки. Пожалуйста, будьте внимательны: старайтесь пользоваться доставкой с наложенным--}}
        {{--платежом с минимальной предоплатой.</td>--}}
{{--</tr>--}}

{{--</table>--}}