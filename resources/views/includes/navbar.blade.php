
<ul>
	 <!-- 
     <li><a class="{{ Request::is('home') || Request::is('/') ? 'active' : '' }}" href="{{ route('home.index') }}">{{ __('nav.search') }}</a></li>
      -->
     <li><a class="{{ Request::is('words/create') ? 'active' : '' }}" href="{{ route('words.create') }}">{{ __('nav.add_word') }}</a></li>
     <li><a class="{{ Request::is('words') ? 'active' : '' }}" href="{{ route('words.index') }}">{{ __('nav.data_list') }}</a></li>
     @if (Auth::user()->role_id == 1)
     <li><a class="{{ Request::is('words/reviews') ? 'active' : '' }}" href="{{ route('words.reviews') }}">{{ __('nav.review_list') }}</a></li>          
     <li><a class="{{ Request::is('categories') || Request::is('categories/*')  ? 'active' : '' }}" href="{{ route('categories.index') }}">{{ __('nav.categories') }}</a></li>       
     <li><a class="{{ Request::is('users') || Request::is('users/*') ? 'active' : '' }}" href="{{ route('users.index') }}">{{ __('nav.users') }}</a></li>
     @endif
</ul>
