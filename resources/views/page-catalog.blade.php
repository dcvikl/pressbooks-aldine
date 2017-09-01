@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <section class="network-catalog">
    <div class="controls">
      <div class="filters">
        <a href="#filter">{{ __('Filter by', 'aldine') }} <svg class="arrow" width="13" height="8" viewBox="0 0 13 8" xmlns="http://www.w3.org/2000/svg"><path d="M6.255 8L0 0h12.51z" fill="#b01109" fill-rule="evenodd"/></svg></a>
        <div id="filter" class="filter-groups">
          @foreach($subject_groups as $key => $val)
          <div class="{{ $key }} subjects" id="{{ $key }}">
            <a href="#{{ $key }}">{{ $val['title'] }} <svg class="arrow" width="13" height="8" viewBox="0 0 13 8" xmlns="http://www.w3.org/2000/svg"><path d="M6.255 8L0 0h12.51z" fill="#b01109" fill-rule="evenodd"/></svg></a>
            <ul class="filter-list">
              @foreach($val['subjects'] as $k => $v)
              <li><a data-filter="{{ $k }}">{{ $v }}</a></li>
              @endforeach
            </ul>
          </div>
          @endforeach
          <div class="licenses" id="licenses">
            <a href="#licenses">{{ __('Licenses', 'aldine' ) }}<svg class="arrow" width="13" height="8" viewBox="0 0 13 8" xmlns="http://www.w3.org/2000/svg"><path d="M6.255 8L0 0h12.51z" fill="#b01109" fill-rule="evenodd"/></svg></a>
            <ul class="filter-list">
              @foreach((new \Pressbooks\Licensing())->getSupportedTypes() as $key => $val)
          		  <li><a data-filter="{{ $key }}">{{ $val['desc'] }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="search">
        <h2><a href="#search">{{ __('Search by titles or keyword', 'aldine') }} <svg class="arrow" width="13" height="8" viewBox="0 0 13 8" xmlns="http://www.w3.org/2000/svg"><path d="M6.255 8L0 0h12.51z" fill="#b01109" fill-rule="evenodd"/></svg></a></h2>
      </div>
      <div class="sort">
        <a href="#sort">{{ __('Sort by', 'aldine') }} <svg class="arrow" width="13" height="8" viewBox="0 0 13 8" xmlns="http://www.w3.org/2000/svg"><path d="M6.255 8L0 0h12.51z" fill="#b01109" fill-rule="evenodd"/></svg></a>
        <ul id="sort" class="sorts">
          <li><a class="is-active" href="#title">{{ __('Title', 'aldine') }}</a></li>
          <li><a href="#subject">{{ __('Subject', 'aldine') }}</a></li>
          <li><a href="#latest">{{ __('Latest', 'aldine') }}</a></li>
        </ul>
      </div>
    </div>
    <div class="books">
      @foreach(App::books(1, 9) as $book)
        @include('partials.book', ['book' => $book])
      @endforeach
    </div>
    <nav class="catalog-navigation">
    </nav>
  </section>
@endsection
