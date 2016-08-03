<?php get_header(); ?>


  <div class="white-wrap">
    <div id="app">
      <router-view></router-view>
    </div>
  </div>

<template id="post-list-template">

  <header class="main-header">
    <img src="<?php bloginfo('template_url'); ?>/images/hero.jpg" class="hero" />
  </header>

<!--
|--------------------------------------------------------------------------
|                           Filters
|--------------------------------------------------------------------------
-->
  <div class="filter-bar">

    <div class="container">
      <a @click="openFilter" class="btn-filter open" v-if="filterBtnOpen">
        <span class="icon-filter"> Open filter</span>
      </a>

      <a @click="closeFilter" class="btn-filter close" v-if="filterBtnClose">
        <span class="icon-filter"> Close filter</span>
      </a>
    </div>

    <div class="filter-wrap" v-if="showFilter" transition="filter">
      <div class="container">
        <div class="by-name">
          <h4>Filter by Name</h4>
          <input type="text" name="" v-model="nameFilter">
        </div> <!-- /.by-name -->

        <div class="by-category clearfix">
          <h4>Filter by Category</h4>
          <div class="radio-wrap">
            <input type="radio" value="" v-model="categoryFilter">
            <label>All</label>
          </div> <!-- /.radio-wrap -->

          <div class="radio-wrap" v-for="category in categories" v-if="category.name != 'Uncategorized'">
            <input type="radio" value="{{ category.id }}" v-model="categoryFilter">
            <label>{{ category.name }}</label>
          </div> <!-- /.radio-wrap -->
        </div> <!-- /.by-category -->
      </div> <!-- /.container -->
    </div> <!-- /.filter-wrap -->
  </div> <!-- /.filter-bar -->

<!--
|--------------------------------------------------------------------------
|                          Post Loops etc.
|--------------------------------------------------------------------------
-->

  <div class="container">
    <div class="post-list">
      <article v-for="post in posts | filterBy nameFilter in 'title' | filterBy categoryFilter in 'categories' " class="post">
        <a @click="getThePost(post.id)">
          <img v-bind:src="post.featured_image_300x180" alt="" />
        </a>
        <div class="post-content">
          {{ post.title.rendered }}
          <small v-for="category in post.cats">
            {{ category.name }}
          </small>
        </div> <!-- /.post-content -->
      </article> <!-- /.post in posts -->
    </div> <!-- /.post-list -->
  </div>  <!-- /.container -->


<!--
|--------------------------------------------------------------------------
|                           Post Preview
|--------------------------------------------------------------------------
-->

  <div class="single-preview">

    <h2>{{ post[0].title.rendered }}</h2>

    <div class="image">
      <img v-bind:src="post[0].full" alt="" />
    </div> <!-- /.image -->

    <div class="post-content">
      {{{ post[0].excerpt.rendered }}}
    </div> <!-- /.post-content -->

    <a @click="getThePost(post[0].next_post)" v-if="post[0].next_post" class="post-nav next">
      <span class="icon-right"></span>
    </a> <!-- /.post-nav next -->

    <a @click="getThePost(post[0].previous_post)" v-if="post[0].previous_post" class="post-nav prev">
      <span class="icon-left"></span>
    </a> <!-- /.post-nav prev -->

  </div> <!-- /.single-preview -->


</template> <!-- /#post-list-template -->

<?php get_footer(); ?>
