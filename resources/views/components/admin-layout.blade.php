@props(['title' => null, 'header' => null])
@php( $title = $title ?? 'Admin' )
@php( $header = $header ?? 'Dashboard' )

<?php /** @var \Illuminate\View\ComponentSlot $slot */ ?>

<?php /**
  Wrapper layout for admin pages.
*/ ?>

@include('admin.layouts.app', ['title' => $title, 'header' => $header, 'slot' => $slot])


