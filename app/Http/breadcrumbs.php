<?php

// Home
Breadcrumbs::register('admin.orders', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('Make customer order', route('admin.orders.create'));
});

Breadcrumbs::register('admin.orders.index', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All orders', route('admin.orders.index'));
});

Breadcrumbs::register('admin.orders.completed', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All completed orders', route('admin.orders.completed'));
});

Breadcrumbs::register('admin.orders.pending', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All pending orders', route('admin.orders.pending'));
});

Breadcrumbs::register('admin.orders.show', function($breadcrumbs, $order)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All orders', route('admin.orders.index'));
    $breadcrumbs->push('Order #' . $order->id, route('admin.orders.show', $order->id));
});

Breadcrumbs::register('admin.products.index', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All products', route('admin.products.index'));
});

Breadcrumbs::register('admin.products.show', function($breadcrumbs, $product)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All products', route('admin.products.index'));
    $breadcrumbs->push($product->name, route('admin.products.show', $product->id));
});

Breadcrumbs::register('admin.recipe.show', function($breadcrumbs, $product)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All products', route('admin.products.index'));
    $breadcrumbs->push($product->name, route('admin.products.show', $product->id));
    $breadcrumbs->push('Recipe', route('admin.recipe.show', $product->id));
});

Breadcrumbs::register('admin.recipe.edit', function($breadcrumbs, $product)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All products', route('admin.products.index'));
    $breadcrumbs->push($product->name, route('admin.products.show', $product->id));
    $breadcrumbs->push('Recipe', route('admin.recipe.show', $product->id));
    $breadcrumbs->push('Edit', route('admin.recipe.edit', $product->id));
});

Breadcrumbs::register('admin.recipe.ingredient.add', function($breadcrumbs, $product)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All products', route('admin.products.index'));
    $breadcrumbs->push($product->name, route('admin.products.show', $product->id));
    $breadcrumbs->push('Recipe', route('admin.recipe.show', $product->id));
    $breadcrumbs->push('Add ingredient', route('admin.recipe.ingredient.add', $product->id));
});

Breadcrumbs::register('admin.ingredient.index', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All ingredients', route('admin.ingredient.index'));
});

Breadcrumbs::register('admin.ingredient.create', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All ingredients', route('admin.ingredient.index'));
    $breadcrumbs->push('Add new ingredient', route('admin.ingredient.create'));
});

Breadcrumbs::register('admin.ingredient.edit', function($breadcrumbs, $ingredient)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All ingredients', route('admin.ingredient.index'));
    $breadcrumbs->push('Edit '.$ingredient->name, route('admin.ingredient.edit'));
});

Breadcrumbs::register('admin.products.edit', function($breadcrumbs, $product)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All products', route('admin.products.index'));
    $breadcrumbs->push($product->name, route('admin.products.show', $product->id));
    $breadcrumbs->push('Edit', route('admin.products.edit'));
});

Breadcrumbs::register('admin.products.create', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All products', route('admin.products.index'));
    $breadcrumbs->push('Add new product', route('admin.products.create'));
});

Breadcrumbs::register('admin.products.low', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('Product with low inventories', route('admin.products.low'));
});

Breadcrumbs::register('admin.supplier.index', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All suppliers', route('admin.supplier.index'));
});

Breadcrumbs::register('admin.supplier.create', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All suppliers', route('admin.supplier.index'));
    $breadcrumbs->push('Add new supplier', route('admin.supplier.create'));
});

Breadcrumbs::register('admin.supplier.show', function($breadcrumbs, $supplier)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All suppliers', route('admin.supplier.index'));
    $breadcrumbs->push($supplier->name, route('admin.supplier.show', array('id' => $supplier->id)));
});

Breadcrumbs::register('admin.supplier.edit', function($breadcrumbs, $supplier)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All suppliers', route('admin.supplier.index'));
    $breadcrumbs->push('Edit '.$supplier->name.' contact information', route('admin.supplier.edit', array('id' => $supplier->id)));
});

Breadcrumbs::register('admin.supplyorder.index', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All supply orders', route('admin.supplyorder.index'));
});

Breadcrumbs::register('admin.supplyorder.create', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All supply orders', route('admin.supplyorder.index'));
    $breadcrumbs->push('Create supply order', route('admin.supplyorder.create'));
});

Breadcrumbs::register('admin.supplyorder.show', function($breadcrumbs, $supplyorder)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All supply orders', route('admin.supplyorder.index'));
    $breadcrumbs->push('Supply order #'.$supplyorder->id, route('admin.supplyorder.show', array('id' => $supplyorder->id)));
});

Breadcrumbs::register('admin.category.index', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All categories', route('admin.category.index'));
});

Breadcrumbs::register('admin.category.create', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All categories', route('admin.category.index'));
    $breadcrumbs->push('Add new category', route('admin.category.create'));
});

Breadcrumbs::register('admin.category.edit', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All categories', route('admin.category.index'));
    $breadcrumbs->push('Edit category', route('admin.category.edit'));
});

Breadcrumbs::register('admin.users.index', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All users', route('admin.users.index'));
});

Breadcrumbs::register('admin.users.create', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All users', route('admin.users.index'));
    $breadcrumbs->push('Create new user', route('admin.users.create'));
});

Breadcrumbs::register('admin.users.show', function($breadcrumbs, $user)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All users', route('admin.users.index'));
    $breadcrumbs->push($user->fname .' '. $user->lname, route('admin.users.show', $user->id));
});

Breadcrumbs::register('admin.schedule.index', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('Employee shifts', route('admin.schedule.index'));
});

Breadcrumbs::register('admin.schedule.create', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('Employee shifts', route('admin.schedule.index'));
    $breadcrumbs->push('Add user to shift', route('admin.schedule.create'));
});

Breadcrumbs::register('admin.hours.index', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('Store hours', route('admin.hours.index'));
});

Breadcrumbs::register('admin.hours.edit', function($breadcrumbs, $hour)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('Store hours', route('admin.hours.index'));
    $breadcrumbs->push('Edit ' . $hour->day . ' hours', route('admin.hours.edit'));
});

Breadcrumbs::register('admin.metrics.orders', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('Order reports', route('admin.metrics.orders'));
});

Breadcrumbs::register('admin.metrics.inventory', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('Inventory reports', route('admin.metrics.inventory'));
});

Breadcrumbs::register('admin.activity', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('Activity log', route('admin.activity'));
});

Breadcrumbs::register('admin.metrics.supply', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('Ingredients inventory', route('admin.metrics.supply'));
});

Breadcrumbs::register('admin.metrics.users', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('User metrics', route('admin.metrics.users'));
});

Breadcrumbs::register('profile.index', function($breadcrumbs, $user)
{
    $breadcrumbs->push($user->fname . '\'s profile', route('profile.index'));
});

Breadcrumbs::register('profile.edit', function($breadcrumbs, $user)
{
    $breadcrumbs->push($user->fname . '\'s profile', route('profile.index'));
    $breadcrumbs->push('Edit', route('profile.edit'));
});

Breadcrumbs::register('profile.address.index', function($breadcrumbs, $user)
{
	$breadcrumbs->push($user->fname . '\'s profile', route('profile.index'));
    $breadcrumbs->push($user->fname . '\'s addresses', route('profile.address.index'));
});

Breadcrumbs::register('profile.address.create', function($breadcrumbs, $user)
{
	$breadcrumbs->push($user->fname . '\'s profile', route('profile.index'));
    $breadcrumbs->push($user->fname . '\'s addresses', route('profile.address.index'));
    $breadcrumbs->push('Create address', route('profile.address.create'));
});

Breadcrumbs::register('profile.address.edit', function($breadcrumbs, $user)
{
	$breadcrumbs->push($user->fname . '\'s profile', route('profile.index'));
    $breadcrumbs->push($user->fname . '\'s addresses', route('profile.address.index'));
    $breadcrumbs->push('Edit address', route('profile.address.edit'));
});

Breadcrumbs::register('profile.card.index', function($breadcrumbs, $user)
{
	$breadcrumbs->push($user->fname . '\'s profile', route('profile.index'));
    $breadcrumbs->push($user->fname . '\'s saved default credit cards', route('profile.card.index'));
});

Breadcrumbs::register('profile.card.create', function($breadcrumbs, $user)
{
	$breadcrumbs->push($user->fname . '\'s profile', route('profile.index'));
    $breadcrumbs->push($user->fname . '\'s saved default credit cards', route('profile.card.index'));
    $breadcrumbs->push('Create credit card', route('profile.card.create'));
});

Breadcrumbs::register('profile.card.edit', function($breadcrumbs, $user)
{
	$breadcrumbs->push($user->fname . '\'s profile', route('profile.index'));
    $breadcrumbs->push($user->fname . '\'s saved default credit cards', route('profile.card.index'));
    $breadcrumbs->push('Edit credit card', route('profile.card.edit'));
});

Breadcrumbs::register('profile.show', function($breadcrumbs, $user, $order)
{
	$breadcrumbs->push($user->fname . '\'s profile', route('profile.index'));
	$breadcrumbs->push('Order #' . $order->id.' ('.$order->status->status.')', route('profile.show', [$order->id]));
});

Breadcrumbs::register('product.item', function($breadcrumbs, $product)
{
    $breadcrumbs->push('All products', route('product.listing'));
    $breadcrumbs->push($product->name, route('product.item', [$product->id]));
});

Breadcrumbs::register('admin.production.index', function($breadcrumbs)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All production schedules', route('admin.production.index'));
});

Breadcrumbs::register('admin.production.edit', function($breadcrumbs, $productionschedule)
{
    $breadcrumbs->push('Admin dashboard', route('admin'));
    $breadcrumbs->push('All production schedules', route('admin.production.index'));
    $breadcrumbs->push('Edit production schedule #' . $productionschedule->id, route('admin.production.edit'));
});
