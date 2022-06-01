<nobr>
  <a class="btn btn-xs btn-default text-primary mx-1 shadow"
    href="{{ route('dashboard.tickets.edit', ['ticket' => $id]) }}" title="Edit">
    <i class="fa fa-lg fa-fw fa-pen"></i>
  </a>

  <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Распечатать билеты"
    href="{{ route('dashboard.order.tickets.pdf', ['order' => $row->booking->order->first()->uuid]) }}">
    <i class="fa fa-lg fa-fw fa-print"></i>
  </a>
  <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Выслать на емеил билеты"
    href="{{ route('dashboard.order.tickets.pdf.email', ['order' => $row->booking->order->first()->uuid]) }}">
    <i class="fa fa-lg fa-fw fa-envelope"></i>
  </a>
  <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="copy to
  clipboard" onclick="copy('{{ $row->getDataCopy() }}')">
    <i class="fa fa-lg fa-fw fa-clipboard"></i>
  </button>
</nobr>
