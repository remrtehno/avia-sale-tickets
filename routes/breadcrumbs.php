<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

//home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('home'));
});

// seat-flight archive
Breadcrumbs::for('seat-flight', function (BreadcrumbTrail $trail, $slot) {
  $trail->push('Главная', route('home'));
  $trail->push('Все рейсы', route('seat-flights.index'));

  if ($slot) {
    $trail->push($slot);
  }
});
