<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <style>
    body {
      font-family: "DejaVu Sans";
      font-size: 12px;
    }

    .right {
      float: right;
    }

    .left {
      float: left;
    }

    .clearfix {
      clear: both;
    }

    .s1 {
      color: #434343;
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: normal;
      text-decoration: none;
      font-size: 18px;
    }

    .s2 {
      color: #434343;
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: normal;
      text-decoration: none;
      font-size: 14px;
    }

    .s3 {
      color: #434343;
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: normal;
      text-decoration: none;
      font-size: 14px;
    }

    .s4 {
      color: #434343;
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: normal;
      text-decoration: none;
      font-size: 11pt;
    }

    .s5 {
      color: #434343;
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: bold;
      text-decoration: none;
      font-size: 10pt;
    }

    .s6 {
      color: #434343;
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: bold;
      text-decoration: none;
      font-size: 14px;
    }

    .s7 {
      color: #434343;
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: normal;
      text-decoration: none;
      font-size: 16px;
    }

    .s8 {
      color: #434343;
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: normal;
      text-decoration: none;
      font-size: 13px;
    }

    p {
      color: #212121;
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: normal;
      text-decoration: none;
      font-size: 14px;
      margin: 0pt;
    }

    .a {
      color: #212121;
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: normal;
      text-decoration: none;
      font-size: 14px;
    }

    h1 {
      color: #212121;
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: bold;
      text-decoration: none;
      font-size: 14px;
    }

    .s9 {
      color: #212121;
      font-family: 'Times New Roman', serif;
      font-style: normal;
      font-weight: normal;
      text-decoration: underline;
      font-size: 14px;
    }

    li {
      display: block;
    }

    #l1 {
      padding-left: 0pt;
      counter-reset: c1 1;
    }

    #l1>li>*:first-child:before {
      counter-increment: c1;
      content: counter(c1, decimal) '. ';
      color: #212121;
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: normal;
      text-decoration: none;
      font-size: 14px;
    }

    #l1>li:first-child>*:first-child:before {
      counter-increment: c1 0;
    }

    table,
    tbody {
      vertical-align: top;
      overflow: visible;
    }

  </style>
</head>

<body>
  <p class="s1" style="
        text-indent: 0pt;
        text-align: center;
      ">
    Маршрутная квитанция электронного билета / Itinerary
  </p>
  <p style="text-indent: 0pt; text-align: left"><br /></p>
  <table class="right" style="border-collapse: collapse" cellspacing="0">
    <tr style="height: 17pt">
      <td style="
            width: 67pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          Агентство:
        </p>
      </td>
      <td style="
            width: 143pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          {{ $seller->name }}
        </p>
      </td>
    </tr>
    <tr style="height: 17pt">
      <td style="
            width: 67pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          Заказ:
        </p>
      </td>
      <td style="
            width: 143pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          {{ $order->uuid }}
        </p>
      </td>
    </tr>
    <tr style="height: 29pt">
      <td style="
            width: 67pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              line-height: 109%;
              text-align: left;
            ">
          Дата оформления:
        </p>
      </td>
      <td style="
            width: 143pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          {{ $order->created_at }}
        </p>
      </td>
    </tr>
    <tr style="height: 17pt">
      <td style="
            width: 67pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          Email:
        </p>
      </td>
      <td style="
            width: 143pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          <a href="mailto:{{ $seller->email }}" class="s3">{{ $seller->email }}</a>
        </p>
      </td>
    </tr>
    <tr style="height: 17pt">
      <td style="
            width: 67pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          Телефон:
        </p>
      </td>
      <td style="
            width: 143pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          {{ $seller->tel }}
        </p>
      </td>
    </tr>
    <tr style="height: 29pt">
      <td style="
            width: 67pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          Адрес:
        </p>
      </td>
      <td style="
            width: 143pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              line-height: 109%;
              text-align: left;
            ">
          {{ $seller->address }}
        </p>
      </td>
    </tr>
  </table>
  <p style="padding-left: 67pt; padding-top: 55px; text-indent: 0pt; text-align: left" class="left">
    <img loading="lazy" width="148" src="data:image/jpeg;base64, {{ base64_encode($logo) }}" />
  </p>

  <div class="clearfix"></div>

  <p style=" text-indent: 0pt; text-align: left"><br />
  </p>
  <table style="border-collapse: collapse; margin-left: 0px; width: 100%;" cellspacing="0">
    <tr style="height: 23pt">
      <td style="
            width: 113pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
          " bgcolor="#F1F1F1">
        <p class="s4" style="
              padding-top: 3pt;
              padding-left: 6pt;
              text-indent: 0pt;
              text-align: left;
            ">
          РЕЙС / FLIGHT
        </p>
      </td>
      <td style="
            width: 153pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
          " bgcolor="#F1F1F1">
        <p style="text-indent: 0pt; text-align: left"><br /></p>
      </td>
      <td style="
            width: 125pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
          " bgcolor="#F1F1F1">
        <p style="text-indent: 0pt; text-align: left"><br /></p>
      </td>
      <td style="
            width: 107pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
          " bgcolor="#F1F1F1">
        <p class="s4" style="padding-top: 3pt; text-indent: 0pt; text-align: right">
          {{-- CT --}}
        </p>
      </td>
      <td style="
            width: 28pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          " bgcolor="#F1F1F1">
        <p class="s4" style="
              padding-top: 3pt;
              padding-right: 4pt;
              text-indent: 0pt;
              text-align: right;
            ">
          {{-- / ST --}}
        </p>
      </td>
    </tr>
    <tr style="height: 18pt">
      <td style="
            width: 498pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
          " colspan="4">
        <p class="s5" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          {{ $flight->direction_from }}
          {{-- <span class="s2">Терминал: 1A </span> --}}
          →
          {{ $flight->direction_to }}
        </p>
      </td>
      <td style="
            width: 28pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        {{-- <p class="s5" style="
              padding-top: 1pt;
              padding-right: 1pt;
              text-indent: 0pt;
              text-align: right;
            ">
          OK
        </p> --}}
      </td>
    </tr>
    <tr style="height: 17pt">
      <td style="
            width: 113pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
          ">
        <p class="s6" style="
              padding-top: 3pt;
              padding-left: 6pt;
              text-indent: 0pt;
              text-align: left;
            ">
          Вылет / departure
        </p>
      </td>
      <td style="
            width: 153pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
          ">
        <p class="s6" style="
              padding-top: 3pt;
              padding-left: 23pt;
              text-indent: 0pt;
              text-align: left;
            ">
          Рейс / flight
        </p>
      </td>
      <td style="
            width: 125pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
          ">
        <p class="s6" style="
              padding-top: 3pt;
              padding-left: 26pt;
              text-indent: 0pt;
              text-align: left;
            ">
          В пути / duration
        </p>
      </td>
      <td style="
            width: 107pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
          ">
        <p class="s6" style="
              padding-top: 3pt;
              padding-left: 22pt;
              text-indent: 0pt;
              text-align: left;
            ">
          Прилёт / arrival
        </p>
      </td>
      <td style="
            width: 28pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p style="text-indent: 0pt; text-align: left"><br /></p>
      </td>
    </tr>
    <tr style="height: 12pt">
      <td style="
            width: 113pt;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
          ">
        <p class="s2" style="
              padding-left: 6pt;
              text-indent: 0pt;
              line-height: 10pt;
              text-align: left;
            ">
          {{ $flight->getDate() }}
          {{ $flight->getTime() }}
        </p>
      </td>
      <td style="width: 153pt">
        <p class="s2" style="
              padding-left: 23pt;
              text-indent: 0pt;
              line-height: 10pt;
              text-align: left;
            ">
          {{ $flight->flight }}
        </p>
      </td>
      <td style="width: 125pt">
        <p class="s2" style="
              padding-left: 26pt;
              text-indent: 0pt;
              line-height: 10pt;
              text-align: left;
            ">
          {{-- Эконом (T) --}}
          {{ $flight->getDuration() }}
        </p>
      </td>
      <td style="width: 107pt">
        <p class="s2" style="
              padding-left: 22pt;
              text-indent: 0pt;
              line-height: 10pt;
              text-align: left;
            ">
          {{ $flight->getDateArrival() }}
          {{ $flight->getTimeArrival() }}
        </p>
      </td>
      <td style="
            width: 28pt;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p style="text-indent: 0pt; text-align: left"><br /></p>
      </td>
    </tr>
    {{-- <tr style="height: 12pt">
      <td style="
            width: 113pt;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
          ">
        <p class="s6" style="
              padding-left: 6pt;
              text-indent: 0pt;
              line-height: 10pt;
              text-align: left;
            ">
          18:10
        </p>
      </td>
      <td style="width: 153pt">
        <p class="s6" style="
              padding-left: 23pt;
              text-indent: 0pt;
              line-height: 10pt;
              text-align: left;
            ">
          BOEING 737
        </p>
      </td>
      <td style="width: 125pt">
        <p class="s6" style="
              padding-left: 26pt;
              text-indent: 0pt;
              line-height: 10pt;
              text-align: left;
            ">
          2 ч 15 мин
        </p>
      </td>
      <td style="width: 107pt">
        <p class="s6" style="
              padding-left: 22pt;
              text-indent: 0pt;
              line-height: 10pt;
              text-align: left;
            ">
          22:25
        </p>
      </td>
      <td style="
            width: 28pt;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p style="text-indent: 0pt; text-align: left"><br /></p>
      </td>
    </tr> --}}
    <tr style="height: 17pt">
      <td style="
            width: 526pt;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          " colspan="5">
        <p class="s6" style="
              padding-left: 290pt;
              padding-right: 183pt;
              text-indent: 0pt;
              line-height: 10pt;
              text-align: center;
              height: 10px;
            ">
          {{-- Багаж 30K --}}
        </p>
      </td>
    </tr>
  </table>
  <p style="text-indent: 0pt; text-align: left"><br /></p>
  <table style="border-collapse: collapse; margin-left: 0px; width: 100%;" cellspacing="0">
    <tr style="height: 26pt">
      <td style="
            width: 146pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          " bgcolor="#F1F1F1">
        <p class="s7" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          ПАССАЖИР
        </p>
        <p class="s8" style="padding-left: 3pt; text-indent: 0pt; text-align: left">
          PASSENGER
        </p>
      </td>
      <td style="
            width: 51pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          " bgcolor="#F1F1F1">
        <p class="s7" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          ТИП
        </p>
        <p class="s8" style="padding-left: 3pt; text-indent: 0pt; text-align: left">
          TYPE
        </p>
      </td>
      <td style="
            width: 116pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          " bgcolor="#F1F1F1">
        <p class="s7" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          НОМЕР ДОКУМЕНТА
        </p>
        <p class="s8" style="padding-left: 3pt; text-indent: 0pt; text-align: left">
          DOCUMENT
        </p>
      </td>
      <td style="
            width: 93pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          " bgcolor="#F1F1F1">
        <p class="s7" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          НОМЕР БИЛЕТА
        </p>
        <p class="s8" style="padding-left: 3pt; text-indent: 0pt; text-align: left">
          TICKET NUMBER
        </p>
      </td>

      <td style="
            width: 57pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          " bgcolor="#F1F1F1">
        <p class="s7" style="
                padding-top: 1pt;
                padding-left: 3pt;
                text-indent: 0pt;
                text-align: left;
              ">
          ТАРИФ
        </p>
        <p class="s8" style="padding-left: 3pt; text-indent: 0pt; text-align: left">
          FARE
        </p>
      </td>
    </tr>
    @foreach ($passengers as $passenger)
      <tr style="height: 29pt">
        <td style="
            width: 146pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
          <p class="s6" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              line-height: 109%;
              text-align: left;
            ">
            {{ $passenger->name }}
            {{ $passenger->surname }}
            {{ $passenger->surname2 }}
            {{-- <span class="s2">, MS</span> --}}
          </p>
        </td>
        <td style="
            width: 51pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
          <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
            {{ $passenger->type }}
          </p>
        </td>
        <td style="
            width: 116pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
          <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
            {{ $passenger->passport_number }}
          </p>
        </td>
        <td style="
            width: 93pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
          <p class="s2" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
            {{ $passenger->uuid }}
          </p>
        </td>
        <td style="
            width: 57pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">

          <p class="s2" style="
            padding-top: 1pt;
            padding-left: 3pt;
            text-indent: 0pt;
            text-align: left;
            ">
            {{ $passenger->getPriceFormatted() }}
          </p>
          <p class="s2" style="
            padding-top: 1pt;
            padding-left: 3pt;
            text-indent: 0pt;
            text-align: left;
            ">
            сўм
          </p>
        </td>
      </tr>
    @endforeach
  </table>
  <p style="text-indent: 0pt; text-align: left"><br /></p>
  <table style="border-collapse: collapse; margin-left: 0px; float:right" cellspacing="0">
    <tr style="height: 18pt">
      <td style="
            width: 165pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          " bgcolor="#F1F1F1">
        <p class="s7" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          Оплата
        </p>
      </td>
      <td style="
            width: 87pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          " bgcolor="#F1F1F1">
        <p class="s7" style="
              padding-top: 1pt;
              padding-left: 2pt;
              padding-right: 1pt;
              text-indent: 0pt;
              text-align: center;
            ">
          ВСЕГО / TOTAL
        </p>
      </td>
    </tr>
    <tr style="height: 29pt">
      <td style="
            width: 165pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s6" style="
              padding-top: 1pt;
              padding-left: 3pt;
              text-indent: 0pt;
              text-align: left;
            ">
          {{-- Наличные --}}
        </p>
      </td>
      <td style="
            width: 87pt;
            border-top-style: solid;
            border-top-width: 2pt;
            border-top-color: #cecece;
            border-left-style: solid;
            border-left-width: 2pt;
            border-left-color: #cecece;
            border-bottom-style: solid;
            border-bottom-width: 2pt;
            border-bottom-color: #cecece;
            border-right-style: solid;
            border-right-width: 2pt;
            border-right-color: #cecece;
          ">
        <p class="s6" style="
              padding-top: 1pt;
              padding-left: 2pt;
              padding-right: 5pt;
              text-indent: 0pt;
              text-align: center;
            ">
          {{ $order->getTotalFormatted() }}
          сўм
        </p>
      </td>
    </tr>
  </table>
  <div style="clear: both"></div>
  <p style="text-indent: 0pt; text-align: left"><br /></p>
  <p style="
        padding-top: 10pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 109%;
        text-align: left;
      ">
    <a href="http://www.iatatravelcenter.com/privacy" class="a" target="_blank">Data Protection Notice:
      Your personal data will be processed in
      accordance with the applicable carrier’s privacy policy and, if your
      booking is made via a reservation system provider (“GDS”), with its
      privacy policy. These are available at </a>http://www.iatatravelcenter.com/privacy or from the carrier or GDS
    directly.You should read this documentation, which applies to your booking
    and specifies, for example, how your personal data is collected, stored,
    used, disclosed and transferred. (applicable for interline carriage)
  </p>
  <h1 style="
        padding-top: 3pt;
        text-indent: 0pt;
        text-align: left;
      ">
    Покупая авиабилет, Клиент принимает правила перевозок авиакомпании и
    указанные ниже условия:
  </h1>
  <ol id="l1">
    <li data-list-text="1.">
      <p style="
            padding-top: 4pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 88%;
            text-align: left;
          ">
        Клиент несет полную и единоличную ответственность за соблюдение всех
        нормативных правовых актов, касающихся выполнения требований по
        обеспечению авиационной безопасности, таможенного, иммиграционного,
        паспортно-визового и других видов контроля стран, из, в и через
        которые осуществляется воздушная перевозка, всех относящихся к
        перевозке требований перевозчика, а также в случае депортации.
      </p>
    </li>
    <li data-list-text="2.">
      <p style="
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 88%;
            text-align: left;
          ">
        Вся информация по паспортно-визовым требованиям, предоставляемая
        агентом является исключительно справочной. Официальную информацию,
        можно получить только у уполномоченных для этого представителей
        консульств и посольств.
      </p>
    </li>
    <li data-list-text="3.">
      <p style="
            padding-left: 16pt;
            text-indent: -10pt;
            line-height: 9pt;
            text-align: left;
          ">
        Сбор за возврат авиабилета: a. до вылета
        <span class="s9">&nbsp; </span>; b. после вылета
        <span class="s9">&nbsp;</span>
      </p>
    </li>
    <li data-list-text="4.">
      <p style="
            padding-left: 16pt;
            text-indent: -10pt;
            line-height: 10pt;
            text-align: left;
          ">
        Сбор за изменение даты вылета: a. до вылета
        <span class="s9">&nbsp; </span>; b. после вылета
        <span class="s9">&nbsp;</span>
      </p>
    </li>
    <li data-list-text="5.">
      <p style="
            padding-left: 16pt;
            text-indent: -10pt;
            line-height: 10pt;
            text-align: left;
          ">
        Любые изменения билета возможны только в течение срока действия
        билета. Срок действия <span class="s9">&nbsp;</span>
      </p>
    </li>
    <li data-list-text="6.">
      <p style="
            padding-left: 16pt;
            text-indent: -10pt;
            line-height: 10pt;
            text-align: left;
          ">
        Регистрация на международный рейс начинается за 3 часа до вылета и
        заканчивается за 1 час до вылета.
      </p>
    </li>
    <li data-list-text="7.">
      <p style="
            padding-left: 16pt;
            text-indent: -10pt;
            line-height: 10pt;
            text-align: left;
          ">
        С вышеуказанными условиями ознакомлен, данные в авиабилете правильные:
        <span class="s9">&nbsp;</span>
      </p>
    </li>
  </ol>
  <p style="
        padding-left: 61pt;
        text-indent: 0pt;
        line-height: 10pt;
        text-align: left;
      ">
    (Ф.И.О., подпись Клиента)
  </p>

</body>

</html>
