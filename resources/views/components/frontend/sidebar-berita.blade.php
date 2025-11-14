 <div id="sidebar" class="span3 sidebar sidebar-right" style="">
     <div class="inner-content">
         <div id="search-2" class="widget widget_meta widget_search">
             <form action="{{ route('cari-berita') }}" id="searchform" class="search-form" method="get">
                 <div>
                     <input type="text" id="search" name="search" value="{{ request('search') }}" onfocus=""
                         onblur=";" autocomplete="off" />
                     <input type="submit" value="Go" />
                 </div>
             </form>
         </div>
         <div id="recent-posts-2" class="widget widget_meta widget_recent_entries">
             <h4>Recent Posts</h4>
             <ul>
                 @foreach ($highlightedPosts as $item)
                     <li>
                         <a href="{{ route('berita-detail', $item->slug) }}">{{ $item->title }}</a>
                         <span class="post-date">{{ $item->created_at->format('F d, Y') }}</span>
                     </li>
                 @endforeach
             </ul>
         </div>
         <div id="categories-2" class="widget widget_meta widget_categories">
             <h4>Categories</h4>
             <ul>
                 @foreach ($categories as $item)
                     <li class="cat-item cat-item-2"><a
                             href="{{ route('berita-ketegori', $item->slug) }}">{{ $item->name }}</a>
                     </li>
                 @endforeach
             </ul>
         </div>
     </div>
 </div>
