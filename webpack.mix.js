const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// css
	// default
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css'
		], 'public/amadeo/css/mix/default.css').version();
	// default

	// home
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-home.css'
		], 'public/amadeo/css/mix/home.css').version();
	// home

	// about staff
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-our-staff.css'
		], 'public/amadeo/css/mix/about-staff.css').version();
	// about staff

	// about us
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-about-us.css'
		], 'public/amadeo/css/mix/about-us.css').version();
	// about us

	// children index
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-children-index.css'
		], 'public/amadeo/css/mix/children-index.css').version();
	// children index

	// children view
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-view-style-1.css'
		], 'public/amadeo/css/mix/children-view.css').version();
	// children view

	// contact
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-contact.css'
		], 'public/amadeo/css/mix/contact.css').version();
	// contact

	// category index
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-index-style-1.css'
		], 'public/amadeo/css/mix/category-index.css').version();
	// category index

	// member index
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-member-index.css'
		], 'public/amadeo/css/mix/member-index.css').version();
	// member index

	// member log in
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-member-log-in.css'
		], 'public/amadeo/css/mix/member-log-in.css').version();
	// member log in

	// member view
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-member-view.css',
		    'public/plugin/simplelightbox-master/simplelightbox.min.css'
		], 'public/amadeo/css/mix/member-view.css').version();
	// member view

	// news event index
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-index-style-1.css',
		    'public/amadeo/css/frontend-news-event-index.css',
		    'public/plugin/owl-carousel/owl.carousel.css',
		    'public/plugin/owl-carousel/owl.theme.css'
		], 'public/amadeo/css/mix/news-event-index.css').version();
	// news event index

	// news event view
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-news-event-view.css'
		], 'public/amadeo/css/mix/news-event-view.css').version();
	// news event view

	// reguler
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-reguler-index.css'
		], 'public/amadeo/css/mix/reguler-index.css').version();
	// reguler

	// view
		mix.styles([
		    'public/plugin/bootstrap-3.3.7/css/bootstrap.min.css',
		    'public/plugin/font-awesome/css/font-awesome.min.css',
		    'public/amadeo/font/font.css',
		    'public/amadeo/css/frontend-public.css',
		    'public/amadeo/css/frontend-public-sub.css',
		    'public/amadeo/css/frontend-view-style-1.css'
		], 'public/amadeo/css/mix/view-style-1.css').version();
	// view

// css

// js
	// default
		mix.scripts([
		    'public/plugin/jquery/jquery-3.2.0.min.js',
		    'public/amadeo/js/publict.js'
		], 'public/amadeo/js/mix/default.js').version();
	// default
	// default public
		mix.scripts([
		    'public/plugin/jquery/jquery-3.2.0.min.js',
		    'public/amadeo/js/publict.js',
		    'public/plugin/bootstrap-3.3.7/js/bootstrap.min.js'
		], 'public/amadeo/js/mix/default-public.js').version();
	// default public
	// member view
		mix.scripts([
		    'public/plugin/jquery/jquery-3.2.0.min.js',
		    'public/amadeo/js/publict.js',
		    'public/plugin/bootstrap-3.3.7/js/bootstrap.min.js',
		    'public/plugin/plugin/simplelightbox-master/simple-lightbox.js'
		], 'public/amadeo/js/mix/member-view.js').version();
	// member view
	// news event index
		mix.scripts([
		    'public/plugin/jquery/jquery-3.2.0.min.js',
		    'public/amadeo/js/publict.js',
		    'public/plugin/bootstrap-3.3.7/js/bootstrap.min.js',
		    'public/plugin/owl-carousel/owl.carousel.min.js'
		], 'public/amadeo/js/mix/news-event-index.js').version();
	// news event index
// js


