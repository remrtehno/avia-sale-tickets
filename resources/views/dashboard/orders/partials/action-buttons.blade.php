<nobr>
  <a class="btn btn-xs btn-default text-primary mx-1 shadow"
    href="{{ route('dashboard.orders.edit', ['order' => $id]) }}" title="Edit">
    <i class="fa fa-lg fa-fw fa-pen"></i>
  </a>
  <a title="Распечатать билеты" href="{{ route('dashboard.order.tickets.pdf', ['order' => $id]) }}">
    <i class="fa fa-lg fa-fw fa-book"></i>
  </a>
</nobr>
