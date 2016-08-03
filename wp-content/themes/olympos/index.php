<?php get_header(); ?>


  <div class="white-wrap">
    <div id="app">
      <router-view></router-view>
    </div>
  </div>

  <template id="post-list-template">

    <div class="container">
      <h4>Filter by Name</h4>
      <input type="text" name="" v-model="nameFilter">

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

    <div class="container">
      <div class="post-list">
        <article v-for="post in posts | filterBy nameFilter in 'title' | filterBy categoryFilter in 'categories' " class="post">
          <img v-bind:src="post.featured_image_300x180" alt="" />
          <div class="post-content">
            {{ post.title.rendered }}
            <small v-for="category in post.cats">
              {{ category.name }}
            </small>
          </div> <!-- /.post-content -->
        </article> <!-- /.post in posts -->
      </div> <!-- /.post-list -->
    </div>  <!-- /.container -->
  </template> <!-- /#post-list-template -->

<?php get_footer(); ?>
